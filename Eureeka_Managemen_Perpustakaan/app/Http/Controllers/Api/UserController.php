<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getallUser(){
        $user = UserModel::all();

        if($user->count() > 0){
            return response()->json([
                'status' => "True",
                'User' =>  $user
            ], 200);
        }

        else{
            return response()->json([
                'status' => "False",
                'Message' =>  "Tidak ada User yang terdata dalam sistem ini"
            ], 404);
        }
    }

    public function Register(Request $input){

        $Validator = Validator::make($input->all(), [
            'nama' => 'required|string|min:1',
            'tipe' => 'required|string|min:1',
            'email' => 'required|string|min:1',
            'password' => 'required|string|min:1',
            'nomor' => 'required|digits:11'
        ]);

        if($Validator->fails()){
            return response()->json([
                'status' => "false",
                'errors' => $Validator->messages()
            ], 422);
        }
        else{
            $user = UserModel::create([
                'Judul' => $input->Judul,
                'nama' => $input->nama,
                'tipe' => $input->tipe,
                'email' => $input->email,
                'password' => $input->password,
                'nomor' => $input->nomor
            ]);

            if($user){
                return response()->json([
                    'status' => 'True',
                    'message' => 'User telah berhasil Registrasi'
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 'False',
                    'message' => 'User gagal registrasi'
                ], 404); 
            }
        }
    }

    public function Login(Request $input){
        $Validator = Validator::make($input->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if($Validator->fails()){
            return response()->json([
                'status' => "false",
                'errors' => $Validator->messages()
            ], 422);
        }
        else{
            $user = UserModel::where('email', $input->email)->first();
            if($user){
                if($user->password===$input->password){
                    return response()->json([
                        'status' => 'True',
                        'message' => 'User telah berhasil Login'
                    ], 200);
                }
                else{
                    return response()->json([
                        'status' => 'False',
                        'message' => 'Password Salah'
                    ], 401); 
                }
            }
            else{
                return response()->json([
                    'status' => 'False',
                    'message' => 'User tidak ditemukan, registrasi terlebih dahulu!!!'
                ], 404); 
            }
        }
    }
}

