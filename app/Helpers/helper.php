<?php

use App\Http\Middleware\TrimStrings;
use App\Models\User;


 function slug_to_string(string $string){
    return str_replace("_"," ", trim($string));
 }
 function string_to_slug(string $string){
    return str_replace(" ","_", trim($string));
 }
 function username($id){
    $comment = User::where('id',$id)->get('name');
    return ucwords($comment[0]->name);
 }

//  function slug_to_string(string $string){
//     $exp = explode("_", $string);
//     return ucwords($exp[0])." ".ucwords($exp[1]);
//  }
// function setdelete($item){
//     return `<form action="{{route('deleteuser',$item)}}" method="POST">
//     <div class="modal-body">
//             @method('DELETE')
//             @csrf
//     </div>
//     <div class="modal-footer">
//         <button class="btn btn-link text-danger p-2" title="Delete User" type="submit"><i class='mdi mdi-delete'></i></button>
//     </div>
// </form>`;
// }

