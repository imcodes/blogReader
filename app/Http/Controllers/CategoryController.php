<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;




class CategoryController extends Controller
{
    public function category_page(){
       $Data = Category::with('blog')->orderBy('id','desc')->paginate(10);
    //    dd($Data);
        return view('admin.category.index',compact(['Data']));
    }
    public function create_category(request $request){
        // dd($request);
        $incomingfeild = $this->validate($request,[
            'category_name'=> 'required|min:5|max:50',
            'description'=> 'max:255'
        ]);
        $incomingfeild['category_name'] = string_to_slug($incomingfeild['category_name']);
        $category = new Category();
       $create = $category->create($incomingfeild);

       if($create){
            return redirect()->back()->with('success','new category created');
       }
    }
    public function blog_category($id, $category){
        $category = Category::where('category_name', $category)->first();
        DB::insert('INSERT INTO blog_category (blog_id,category_id) VALUES (?,?)',[$id,$category->id]);
    }
    public function Blog_category_update($id,$name){
        // dd($request->name);
        $category = Category::where('category_name',$name)->first();
        // dd($category);
        DB::update('UPDATE blog_category set category_id = ? where blog_id  = ?', [$category->id,$id]);
    }
    public function delete_category($id){
        DB::delete('DELETE FROM blog_category where category_id = ?',[$id]);
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
    public function view_categories($name){
        $name = str_replace('-','_',$name);
        $category = DB::select("SELECT id,category_name,description FROM categories where category_name = ?",[$name]);
        $blogids = DB::select("SELECT blog_id FROM blog_category where category_id = ? ORDER BY created_at desc" ,[$category[0]->id]);
        $i = 0;
        foreach ($blogids as $id) {
            $blog = Blog::with('user')->where('id',$id->blog_id)->get();
            $allblogs[$i] = $blog[0];
            $i++;
        }
        // dd($allblogs);

        return view('admin.category.categories',compact(['allblogs','category']));

    }
}
