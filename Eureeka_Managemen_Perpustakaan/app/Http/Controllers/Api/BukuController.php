<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BUKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function getall(){
        $buku = BUKU::all();

        if($buku->count() > 0){
            return response()->json([
                'status' => "True",
                'buku' =>  $buku
            ], 200);
        }

        else{
            return response()->json([
                'status' => "False",
                'Message' =>  "Tidak ada buku dalam sistem ini"
            ], 404);
        }
    }

    public function InsertBook(Request $input){

        $Validator = Validator::make($input->all(), [
            'Judul' => 'required|string|min:1',
            'ISBN' => 'required|string|min:1',
            'Penulis' => 'required|string|min:1',
            'Tahun' => 'required|digits:4'
        ]);

        if($Validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $Validator->messages()
            ], 422);
        }
        else{
            $Buku = BUKU::create([
                'Judul' => $input->Judul,
                'ISBN' => $input->ISBN,
                'Penulis' => $input->Penulis,
                'Tahun' => $input->Tahun
            ]);

            if($Buku){
                return response()->json([
                    'status' => 'True',
                    'message' => 'Buku telah ditambahkan'
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 'False',
                    'message' => 'Buku Gagal ditambahkan'
                ], 500); 
            }
        }
    }

    public function GetById($id){
        $buku = BUKU::find($id);
        if($buku){
            return response()->json([
                'status' => 'True',
                'Book' => $buku
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'False',
                'message' => 'Buku Tidak ditemukan'
            ], 404);  
        }
    }

    public function UpdateBook(Request $input, int $id){
        $Validator = Validator::make($input->all(), [
            'Judul' => 'required|string|min:1',
            'ISBN' => 'required|string|min:1',
            'Penulis' => 'required|string|min:1',
            'Tahun' => 'required|digits:4'
        ]);

        if($Validator->fails()){
            return response()->json([
                'status' => 'false',
                'errors' => $Validator->messages()
            ], 422);
        }
        else{
            $Buku = BUKU::find($id);
            if($Buku){
                $Buku -> update([
                    'Judul' => $input->Judul,
                    'ISBN' => $input->ISBN,
                    'Penulis' => $input->Penulis,
                    'Tahun' => $input->Tahun
                ]);

                return response()->json([
                    'status' => 'True',
                    'message' => 'Buku telah diperbarui'
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 'False',
                    'message' => 'Tidak ada buku dengan ID tersebut'
                ], 404); 
            }
        }
    }

    public function DeleteBook($id){
        $Buku = BUKU::find($id);
        if($Buku){
            $Buku -> delete();
            return response()->json([
                'status' => 'True',
                'message' => 'Buku Telah terhapus'
            ], 200); 
        } 
        else{
            return response()->json([
                'status' => 'False',
                'message' => 'Tidak ada buku dengan ID tersebut'
            ], 404); 
        }
    }
}
