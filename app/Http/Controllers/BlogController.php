<?php

namespace App\Http\Controllers;

use App\Models\Blogdetail;
use App\Models\Category;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Redirect;

class BlogController extends Controller
{
    private function findBlogBySlug(string $slug)
    {
        $ne = DB::table('blogdetails')
            ->where([['blogdetails.slug', '=', $slug], ['blogdetails.deleted_at', '=', null]])
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'C.name as category_name', 'BI.name as bannerImageName')
            ->first();
        // print_r($ne);die;
        return $ne;
    }

    private function fetchAllBlogs(string $category = null)
    {
        $query = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')->limit(8);
        if ($category) {
            $query->where('blogdetails.category', '=', $category);
        }
        return $query->get();
    }

    private function fetch_Blog(string $category = null)
    {
        $query = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc');
        if ($category) {
            $query->where('blogdetails.category', '=', $category);
        }
        return $query->get();
    }

    private function fetch_similar(string $category = null)
    {
        $query = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')->limit(4)->get();
        if ($category) {
            $query->where('blogdetails.category', '=', $category);
        }
        return view('blogs.blog_details_data', $category);
    }

    private function fetchAllBlogsRecent(string $category = null)
    {
        $query = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')->limit(4);
        if ($category) {
            $query->where('blogdetails.category', '=', $category);
        }
        return $query->get();
    }

    private function fetchAllBlogsRecentPost(string $category = null)
    {
        $query = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')->limit(5);
        if ($category) {
            $query->where('blogdetails.category', '=', $category);
        }

        return $query->get();
    }

    public function index(Request $request)
    {
        $category = $request->query('category');
        $perPage  = 6;

        $blogs      = Blogdetail::paginate($perPage);
        $categories = Category::where('status', 6)->get();

        return view('blogs', compact('blogs', 'categories'));
    }

    // public function show($slug)
    // {
    //     $blog = Blogdetail::where('slug', $slug)->firstOrFail();
    //     return view('blogs.show', compact('blog'));
    // }

    public function show($slug)
    {
        $blog = Blogdetail::where('slug', $slug)->first();

        return view('show', compact('blog'));
    }

    public function findBySlug(Request $request, string $slug)
    {
        $blog = $this->findBlogBySlug($slug);
        // print_r( $blog);die;
        if ($blog->tableContent) {
            $tab                = explode(",", $blog->tableContent);
            $blog->tableContent = $tab;
        }
        $blog->content = preg_replace('/style="[^"]*font-size:\s*1rem;[^"]*"/i', '', $blog->content);
        $category      = $request->query('category');
        $blogs         = $this->fetchAllBlogs($category);

        $recent_blog  = $this->fetchAllBlogsRecent($category);
        $recent_blogs = $this->fetchAllBlogsRecentPost($category);

        $categories  = Category::where('status', 1)->get();
        $categoriess = Category::where('status', 1)->first();

        if ($blog) {
            return view('blogs.blog_details_data', ['blog' => $blog, 'blogs' => $blogs, 'categories' => $categories, 'recent_blog' => $recent_blog, 'recent_blogs' => $recent_blogs, 'categoriess' => $categoriess]);
        } else {
            return redirect()->action('BlogsController@index');
        }

    }

    public function fetchAllBlog(Request $request)
    {
        $category   = $request->query('category');
        $blogs      = $this->fetch_Blog($category);
        $categories = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')
            ->get();

        return view('blogs.blog_detailes', ['blogs' => $blogs, 'categories' => $categories]);
    }
    public function fetchAllBlogAdmin(Request $request)
    {
        $category   = $request->query('category');
        $blogs      = $this->fetch_Blog($category);
        $categories = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')->get();

        return view('admin.blogs.blog-list', ['blogs' => $blogs, 'categories' => $categories]);
    }

    public function AllBlogAdmin()
    {
        $blogs = BlogDetail::all();

        return view('admin.blogs.blog-list', ['blogs' => $blogs]);
    }

    public function fetchblog(Request $request)
    {
        $category   = $request->query('category');
        $blogs      = $this->fetch_Blog($category);
        $categories = DB::table('blogdetails')
            ->leftJoin('uploads as MI', 'MI.id', '=', 'blogdetails.meta_image')
            ->leftJoin('uploads as BI', 'BI.id', '=', 'blogdetails.bannerimage2')
            ->join('categories as C', 'C.id', '=', 'blogdetails.category')
            ->select('blogdetails.*', 'MI.hash as metaImageHash', 'MI.name as metaImageName', 'BI.hash as bannerImageHash', 'BI.name as bannerImageName', 'C.name as categoryName', 'C.id as categoryId')
            ->where('blogdetails.deleted_at', null)->orderBy('blogdetails.id', 'desc')->limit(4)->get();

        return view('blogs.blog_detailes', ['blogs' => $blogs, 'categories' => $categories]);
    }

    public function upload(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $uploadedFile      = $request->file('image');
        $originalFilename  = $uploadedFile->getClientOriginalName();
        $sanitizedFilename = preg_replace("/[^a-zA-Z0-9.]+/", "_", $originalFilename);
        $path              = $uploadedFile->storeAs('uploads', $sanitizedFilename, 'public');
        // $path = $uploadedFile->store('uploads', 'public');
        $url = asset('storage/' . $path);
        return response()->json([
            'uploaded' => true,
            'fileName' => $originalFilename,
            'url'      => $url,
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'bannerImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'metaImage'   => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'Image'       => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'date'        => 'required',
            'tag'         => 'required',
            'category'    => 'required',

        ]);

        BlogDetail::create([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'date'        => $request->input('date'),
            'tag'         => $request->input('tag'),
            'category'    => $request->input('category'),
        ]);

        return redirect()->route('admin.blog-list')->with('success', 'Blog created successfully');
    }

    public function editBlog($id)
    {
        $blogs = Blogdetail::findOrFail($id);

        return view('admin.blogs.edit', compact('blogs'));

    }


    public function update(Request $request)
    {

        //    echo"<pre>"; print_r($request->all()); die;
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'date'        => 'required|date',
            'tag'         => 'required',
            'category'    => 'required',
            'content'     => 'required',
        ]);

        $blog = BlogDetail::findOrFail($request->input('id'));

        $uniqueString = time();
        $uploadedImage          = $request->file('Image');
        $oldImage =   $request->input('oldImage');
        if(isset($uploadedImage))
        {
            $uploadedImageName      = $uploadedImage->getClientOriginalName();
            $sanitizedFilenameImage = $uniqueString . '_' . preg_replace("/[^a-zA-Z0-9.]+/", "_", $uploadedImageName);
            $pathImage              = $uploadedImage->storeAs('public/uploads', $sanitizedFilenameImage, 'public');
            $urlImage               = asset('storage/' .  $pathImage);

        }else
        {
            $urlImage =  $oldImage;
        }

        // $formattedDate = Carbon::createFromFormat('d-M-Y', $request->input('date'))->format('Y-m-d');
        // print_r($request->input('date')); die;
        $blog->update([
            'title'       => $request->input('title'),
            'date'        => $request->input('date'),
            'description' => $request->input('description'),
            'image'       => $urlImage,
            // 'date'        => $request->input('date'),
            'tag'         => $request->input('tag'),
            'category'    => $request->input('category'),
            'content'     => $request->input('content'),
        ]);

        Session::flash('success', 'Blog updated successfully');

        return redirect('admin/blog-list')->with('success', 'Blog updated successfully');

        // return redirect()->route('')->with('success', 'Blog updated successfully');
    }

    public function addBlog(Request $request)
    {
        $request->validate([
            'Image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'        => 'required',
            'description' => 'required',
            'date'        => 'required',
            'tag'         => 'required',
            'category'    => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $uniqueString = time();

            // Upload additional image
            $uploadedImage          = $request->file('Image');
            $uploadedImageName      = $uploadedImage->getClientOriginalName();
            $sanitizedFilenameImage = $uniqueString . '_' . preg_replace("/[^a-zA-Z0-9.]+/", "_", $uploadedImageName);
            $pathImage              = $uploadedImage->storeAs('public/uploads', $sanitizedFilenameImage, 'public');
            $urlImage               = asset('storage/' .  $pathImage);

            // Blog detail record
            $data = Blogdetail::create([
                'title'        => $request->name,
                'description'  => $request->description,
                'date'         => $request->date,
                'content'      => $request->content,
                'tableContent' => $request->input('table_content'),
                'tag'          => $request->tag,
                'category'     => $request->category,
                'slug'         => Str::slug($request->name, "-"),
                'image'        => $urlImage,
            ]);

            DB::commit();
            return redirect('admin/blog-list')->with('message', 'Blog Added Successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/blog-list')->with('error', 'Something went wrong!');
        }
    }

    private function uploadBenner($filename, $path)
    {
        DB::beginTransaction();
        try {
            $upload = Upload::create([
                "name"      => $filename,
                "path"      => $path,
                "extension" => pathinfo($filename, PATHINFO_EXTENSION),
                "caption"   => "",
                "hash"      => "",
                "public"    => true,
                "user_id"   => 1,
            ]);
            while (true) {
                $hash = strtolower(Str::random(10));
                if (!Upload::where("hash", $hash)->count()) {
                    $upload->hash = $hash;
                    break;
                }
            }
            $upload->save();
            DB::commit();
            return $upload->id;
        } catch (\Exception $ex) {
            print_r($ex);
            DB::rollBack();
        }
    }

    public function deleteBlog($id)
    {
        $data = Blogdetail::find($id)->delete();
        if ($data) {
            return Redirect('admin/blog-list')->with('message', 'Blog deleted Successfully');
        } else {
            return Redirect('admin/blog-list')->with('error', 'Something went wrong!.');
        }
    }
}
