<?php
use App\Post;
use App\User;
use App\Role;
use App\Country;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('admin/post', function () {
//     // return view('welcome');
//     return "Hi You";
// });
// Route::get('/about', function () {
//     // return view('welcome');
//     return "Hi about page";
// });
// Route::get('/contact', function () {
//     // return view('welcome');
//     return "Hi I am contact.";
// });
// Route::get('/post/{id}/{name}', function($id,$name)
// {
//   return "This is post number ".$id." Name : ".$name;
// });
// Route::get('admin/post/example',array('as'=>'admin.home', function()
// {
//   // $url = route('admin.home');
//   return "This url is ". $url;
// }));
// Route::get('/post/{id}','PostController@index');
Route::resource('posts','PostController');
Route::get('/contact','PostController@contact');
Route::get('post/{id}/{name}/{password}','PostController@show_post');
//---------------------------------------------------------------------
//                          SQL QUERY
//---------------------------------------------------------------------
Route::get('/insert', function()
{
  DB::insert('Insert into posts(title,content) value(?,?)',['Laravel is awesome with Edwin','Laravel news']);

});
// Route::get('/read', function()
// {
//   $result = DB::select('select * from post where id = ?',[1]);
//   // foreach ($result as $post) {
//   //   # code...
//   //   return $post->title;
//   // }
//   return var_dump($result);
// });
// Route::get('/update', function()
// {
//   $updated = DB::update('update post set title = "Update Title" where id=?',[1]);
//   return $updated;
// });
// Route::get('/delete', function()
// {
//     $delete = DB::delete('Delete from post where id = ?',[1]);
//     return $delete;
// });
//---------------------------------------------------------------------
//                          Eloquent
//---------------------------------------------------------------------

// Route::get('/read', function()
// {
//     $posts = Post::all();
//     foreach ($posts as $post) {
//       # code...
//       return $post->title;
//     }
// });
// Route::get('/find', function()
// {
//     $posts = Post::find(2);
//     return $posts->title;
//     // foreach ($posts as $post) {
//     //   # code...
//     //   return $post->title;
//     // }
// });
// Route::get('/findwhere', function()
// {
//   $posts = Post::where('id',3)->orderBy('id','desc')->take(1)->get();
//   return $posts;
// });
// Route::get('/findmore', function()
// {
//     // $posts = Post::findOrFail(1);
//     // return $posts;
//     $posts = Post::where('user_count','<',50)->firstOrFail();
//     return $posts;
// });

Route::get('/basicinsert', function()
{
  $post = new Post; //ถ้า $post =  Post::find(2); เป็น update
  $post->title = 'New 1';
  $post->content = 'Laravel 1';
  $post->save();
});

Route::get('/create', function()
{
  Post::create(['title'=>'The create method1','content'=>'WoW 1']);
  Post::create(['title'=>'The create method2','content'=>'WoW 2']);
});
//
// Route::get('/update', function()
// {
//   Post::where('id',2)->where('is_admin', '0')->update(['title'=>'New PHP Title','content'=>'New Content']);
// });
//
Route::get('/delete', function()
{
  $post = Post::find(4);
  $post->delete();
});
// Route::get('/delete2', function()
// {
//   Post::destroy([4,5]);
//   Post ::where('is_admin', 0)->delete();
//
// });
// Route::get('/softdelete', function()
// {
//   Post::find(8);
// });
// Route::get('/readsoftdelete', function()
// {
//   //  $post = Post::find(8);
//   // return $post;
//   // $post = Post::withTrashed()->where('is_admin', 0)->get();
//   // return $post;
//   // $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//   // return $post;
// });
// Route::get('/restore', function()
// {
//   Post::withTrashed()->where('is_admin', 0)->restore();
// });
// Route::get('/forcedelete', function()
// {
//   // Post::withTrashed()->where('id', 3)->forcedelete();
//   Post::onlyTrashed()->where('is_admin', 0)->forcedelete();
// });
//---------------------------------------------------------------------
//                    Eloquent Relationship
//---------------------------------------------------------------------


//One to One Relationship
// Route::get('/user/{id}/post/', function($id)
// {
//   return User::find($id)->post->title;
// });
// Route::get('/post/{id}/user', function($id)
// {
//   return Post::find($id)->user->name;
// });
//One to Many Relationship
// Route::get('/posts', function()
// {
//   $user = User::find(1);
//   foreach ($user->posts as $post) {
//    echo $post->title."</br>";
//   }
// });
//Many to Many Relationship
// Route::get('/user/{id}/role', function($id)
// {
//   $user = User::find($id)->roles()->orderBy('id','desc')->get();
//   return $user;
//   // foreach ($user->roles as $role) {
//   //   return $role->name;
//   // }
//
// });
//Accesing to intermediate table /pivot
// Route::get('/user/pivot', function()
// {
//   $user = User::find(1);
//   foreach ($user->roles as $role) {
//     # code...
//     return $role->pivot->created_at;
//   }
// });
//แสดงชื่อเรื่องของคนที่อยู่ในประเทศที่ id = 1
// Route::get('/user/country', function()
// {
//   $country = Country::find(1);
//   foreach ($country->posts as $post) {
//     return $post->title;
//   }
// });
//Polymorphic Relationship
Route::get('/user/photos', function()
{
  $user = User::find(1);
  foreach ($user->photos as $photo) {
    return $photo->path;
  }
});
