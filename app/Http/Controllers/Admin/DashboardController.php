<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Repositories\Eloquent\SiteSettingRepository;
// Removed: use App\Repositories\Contracts\ContactRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;
use App\Services\Admin\AdminServices;
// Removed: use App\Repositories\CommonRepository;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadImageTrait;

class DashboardController extends Controller
{
    use UploadImageTrait;
    protected $siteSettingRepo;
    // protected $contentRepository; // Removed
    protected $AdminServices;
    // protected $CommonRepository; // Removed
    // protected ContactRepositoryInterface $ContactRepository; // Removed
    public function __construct(AdminServices $AdminServices, SiteSettingRepository $siteSettingRepo /*, ContentRepository $contentRepository, CommonRepository $CommonRepository*/)
    {
        $this->siteSettingRepo = $siteSettingRepo;
        // $this->ContactRepository = $ContactRepository;
        $this->AdminServices = $AdminServices;
        // $this->contentRepository = $contentRepository;
        // $this->CommonRepository = $CommonRepository;
    }
    public function index()
    {
        try {

            return view('admin.dashboard');
        } catch (Exception $e) {
            Log::error("AuthController : index()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }
    public function profile()
    {
        try {
            $settings = $this->siteSettingRepo->getAllSettings();

            return view('admin.profile', compact('settings'));
        } catch (Exception $e) {
            Log::error("AuthController : profile()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }
    public function siteSettingsUpdate(Request $request)
    {
        try {
            // dd($request);
            $data = $request->only(['address', 'phone', 'email', 'facebook', 'instagram', 'linkedin', 'twitter', 'pinterest', 'google']);

            $this->siteSettingRepo->updateSettings($data);

            return response()->json(['status' => true, 'message' => __('message.statusTwo', ['parameter' => 'Site settings'])]);
        } catch (Exception $e) {
            Log::error("AuthController : index()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }

    public function categoryList(){
        try{
            // $categories = $this->contentRepository->getAll();
            $categories = []; // Placeholder or fetch from another source if needed
            // $regions = $this->CommonRepository->getRegions();
            $regions = [];
            return view('admin.categoryList', compact('categories', 'regions'));
        }catch (\Exception $e) {
          Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
          return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422); 
        }
    }

    public function getProvinces(Request $request){
        try{
            // $provinces = $this->CommonRepository->getProvinces($request->region_ids, ['id', 'name']);
            $provinces = [];
            return response()->json($provinces);
        }catch (\Exception $e) {
            Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }

    public function getMunicipalities(Request $request){
        try{
            // $municipalities = $this->CommonRepository->getAllMunicipalities(['region_id'=>$request->province_ids], ['id', 'name']);
            $municipalities = [];
            return response()->json($municipalities);
        }catch (\Exception $e) {
            Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }

public function createCategory(Request $request)
{
    $request->validate([
        'category'      => 'required|string|max:255',
        'image'         => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        'description'   => 'nullable|string|max:2000',
    ]);

    try {
        $categoryData = [
            'category_name' => $request->category,
            'image' => $this->uploadImage($request->file('image'), 'category'),
            'regions' => $request->regions,
            'provinces' => [],
            'municipalities' =>$request->municipality,
            'description' => $request->description,
        ];

        // $data = $this->contentRepository->create($categoryData);
        $data = null; // Placeholder

        if (!$data) {
            return response()->json([
                'status' => 0,
                'message' => 'Category not created',
                'errors' => [],
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Category created successfully',
            'errors' => [],
            'data' => $data
        ], 200);

    } catch (Exception $e) {
        Log::error("Error in " . __CLASS__ . "::" . __FUNCTION__ . ": " . $e->getMessage());
        return response()->json([
            'status' => 0,
            'message' => 'Something went wrong',
            'errors' => $e->getMessage(),
            'data' => []
        ], 500);
    }
}




  public function updateCategory(Request $request)
{
        try {
            $validator = Validator::make($request->all(), [
                'category_id'   => 'required|exists:category,id',
                'category'      => 'required|string|max:255',
                'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'description'   => 'nullable|string|max:2000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors()
                ], 422);
            }

            $categoryData = [
                'category_name' => $request->category,
                'regions'       => $request->regions,
                'provinces'     => $request->provinces,
                'municipalities'=> $request->municipality,
                'description'   => $request->description,
            ];

            if ($request->hasFile('image')) {
                // $cat_data = $this->contentRepository->getOne(['id' => $request->category_id]);
                $cat_data = null; // Placeholder
                if ($cat_data && $cat_data->image) {
                    $this->deleteImage($cat_data->image);
                }
                $categoryData['image'] = $this->uploadImage($request->file('image'), 'category');
            }

            // $data = $this->contentRepository->update(['id' => $request->category_id], $categoryData);
            $data = null; // Placeholder

            if (!$data) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Category not updated',
                    'errors' => []
                ], 200);
            }

            return response()->json([
                'status' => 1,
                'message' => 'Category updated successfully',
                'errors' => [],
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            Log::error("Error in " . __CLASS__ . "::" . __FUNCTION__ . ": " . $e->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'Something went wrong',
                'errors' => [],
                'data' => []
            ], 500);
        }
    }

    public function deleteCategory(Request $request){
        try{
            // $data = $this->contentRepository->delete(['id' => $request->category_id]);
            $data = null; // Placeholder
            if(!$data){
                return response()->json(['status' => '0', 'message' => 'Category not deleted', 'error' => '', 'data' => []], 200);
            }
            return response()->json(['status' => '1', 'message' => 'Category deleted successfully', 'error' => '', 'data' => []], 200);
        }catch (Exception $e){
            Log::error("Error in " . __CLASS__ . "::" . __FUNCTION__ . ": " . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }


    public function subCategoryList(){
        try{
            // $categories = $this->contentRepository->getAll();
            // $subCategories = $this->contentRepository->getSubCategories();
            $categories = [];
            $subCategories = [];
            return view('admin.subCategoryList', compact('categories', 'subCategories'));
        }catch (\Exception $e){
            Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }

    public function createSubCategory(Request $request){
        try{
            $request->validate([
                'category' => 'required',
                'parent_category' => 'required',
            ]);
            // $data = $this->contentRepository->createSubCategory([
            //     'name' => $request->category,
            //     'category_id' => $request->parent_category
            // ]);
            $data = null; // Placeholder
            if(!$data){
                return response()->json(['status' => '0', 'message' => 'Category not created', 'error' => '', 'data' => []], 200);
            }
            return response()->json(['status' => '1', 'message' => 'Sub Category created successfully', 'error' => '', 'data' => []], 200);
        }catch (\Exception $e){
            Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }

    public function updateSubCategory(Request $request){
        try{
            $request->validate([
                'category' => 'required',
            ]);
            $category_name = [
                'name' => $request->category,
                'category_id' => $request->parent_category,
            ];
            // $data = $this->contentRepository->updateSubCategory(['id' => $request->category_id], $category_name);
            $data = null; // Placeholder
            if(!$data){
                return response()->json(['status' => '0', 'message' => 'Category not updated', 'error' => '', 'data' => []], 200);
            }
            return response()->json(['status' => '1', 'message' => 'Category updated successfully', 'error' => '', 'data' => []], 200);
        }catch (\Exception $e){
            Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }

    public function deletesubcategory(Request $request){
        try{
            // $data = $this->contentRepository->deleteSubCategory(['id' => $request->category_id]);
            $data = null; // Placeholder
            if(!$data){
                return response()->json(['status' => '0', 'message' => 'Category not deleted', 'error' => '', 'data' => []], 200);
            }
            return response()->json(['status' => '1', 'message' => 'Category deleted successfully', 'error' => '', 'data' => []], 200);
        }catch (\Exception $e){
            Log::error('Error in' . __CLASS__ . ' line ' . __LINE__ . ' : ' . $e->getMessage());
            return response()->json(['status' => '0', 'message' => 'Some thing went wrong', 'error' => $e->getMessage(), 'data' => []], 422);
        }
    }

}
