<?php

namespace App\Repositories;

use App\Models\PemiluCandidate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\PemiluVote;

class PemiluVoteRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable($status)
    {
        $users = null;
        
        if (!is_null($status)) {
            $users = PemiluVote::where('vote_status', '=', $status)->orderBy('created_at', 'desc')->get();
        } else {
            $users = PemiluVote::all();
        }

        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<div class="d-flex align-items-center">
                            <a href="' . route('dashboard.admin.pemilu-vote.edit', $user->id) . '" class="btn btn-sm btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>';
            })
            ->addColumn('nim', function ($user) {
                return $user->nim;
            })
            ->addColumn('token', function ($user) {
                return $user->token;
            }) 
            ->addColumn('vote_status', function ($user) {
                $status = $user->vote_status;
                if ($status === 0) {
                    return '<p class="badge badge-danger"> Belum Memilih </p>';
                }
                return '<p class="badge badge-primary"> Kandidat' .$status. '</p>' ;
            }) 
            ->addColumn('email_status', function ($user) {
                $status = $user->email_status;
                switch ($status) {
                    case 2:
                        return '<p class="badge badge-danger"> Gagal </p>';
                
                    case 1:
                        return '<p class="badge badge-success"> Terkirim </p>';

                    // Add more cases as needed
                    default:
                        return '<p class="badge badge-secondary"> Belum </p>';
                }
            }) 
            ->rawColumns(['action', 'vote_status', 'email_status',])
            ->make(true);
    }

    public function get()
    {
        return PemiluVote::all();
    }
    

    public function count(array $condition = [])
    {
        return PemiluVote::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    public function countTotal()
    {
        $candidates = PemiluCandidate::select('id', 'nama')
        ->withCount(['votes as total_votes' => function ($query) {
            $query->where('vote_status', '>', 0);
        }])
        ->get();
    
        $notVotedCount = PemiluVote::where('vote_status', 0)->count();
        
        // Format the response to include "not voted" and candidate vote counts
        $response = [
            'Belum Vote' => $notVotedCount,
        ];
        
        foreach ($candidates as $candidate) {
            $response[$candidate->nama] = $candidate->total_votes ?? 0; // Default to 0 if no votes
        }
        
        return $response;

    }

    /**
     * Get User by id
     *
     * @param int $id
     * @return PemiluVote
     */
    public function findById($id)
    {
        return PemiluVote::find($id);
    }
    
    public function vote($data)
    {
        try {
            
            $user = new PemiluVote;
            $user->nim = $data['nim'];
            $user->token = Str::random(8);
            $user->vote_status = $data['vote_status'];
            $user->email_status = $data['email_status'];
            $user->created_at = now();

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }
    
    public function createVoter($request)
    {   
        try {
            // Initialize an empty array for NIMs
            $nimList = [];

            // Step 1: Handle Textarea input
            if ($request->has('nim_list')) {
                // Explode the textarea into an array of NIMs based on line breaks
                $nimListFromText = preg_split('/\r\n|\r|\n/', $request->input('nim_list'));
                $nimList = array_merge($nimList, array_filter($nimListFromText));
            }

            // Step 2: Handle CSV upload
            if ($request->hasFile('csv')) {
                $csvFile = $request->file('csv');
                if (($handle = fopen($csvFile->getRealPath(), 'r')) !== false) {
                    // Read the CSV file with headers
                    $header = fgetcsv($handle, 1000, ','); // Get the header row
                    $nimIndex = array_search('NIM', $header); // Find the index of 'nim' column
        
                    // Make sure 'nim' column exists in the header
                    if ($nimIndex !== false) {
                        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                            // Add the 'nim' from each row to the list
                            $nimList[] = $row[$nimIndex];
                        }
                    }
        
                    fclose($handle);
                }
            }
            // Step 3: Remove duplicate NIMs and prepare for saving
            $nimList = array_unique($nimList);

            foreach ($nimList as $nim) {
                \Validator::make(['nim' => $nim], [
                    'nim' => 'required|string|max:20', // Ensure NIM meets requirements
                ])->validate();
        
                // Save each NIM to the database
                PemiluVote::create([
                    'nim' => $nim,
                    'token' => Str::random(8),
                    'vote_status' => 0, // Default vote status
                    'email_status' => 0, // Default email status
                ]);
            }
        
            return 1;
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param PemiluVote $data
     * @return PemiluVote
     */
    public function update($id, $data)
    {
        try {
            
            $user = PemiluVote::find($id); 
            $user->nim = $data['nim'];
            $user->token =  $data['token'];
            $user->vote_status = $data['vote_status'];
            $user->email_status = $data['email_status'];
            $user->updated_at = now();

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    public function refreshToken($id)
    {
        try {
            
            $user = PemiluVote::find($id); 
            $user->token = Str::random(8);
            $user->updated_at = now();

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }
    
    /**
     * @param array ids
     */
    public function destroys(array $ids)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('pemilu_vote')->whereRaw($query)->delete();

        return $result;
    }
}
