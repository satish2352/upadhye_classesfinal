<?php

namespace App\Http\Controllers\Admin\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\DynamicPages\DynamicPagesServices;
use Validator;
use App\Models\ {
	DynamicWebPages,
    MainMenus,
    MainSubMenus
};
use Config;
use Illuminate\Support\Facades\Storage;
class DynamicPagesController extends Controller
{

   public function __construct()
    {
        $this->service = new DynamicPagesServices();
    }
    public function index()
    {
        try { 
            $dynamic_page = $this->service->getAll();
            return view('admin.pages.dynamic-pages.list-page', compact('dynamic_page'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        $main_menu_data = $this->getMenuItemsForDynamicPageAdd();
        return view('admin.pages.dynamic-pages.add-page',  ['main_menu_data' => $main_menu_data]);
    }

    public function store(Request $request) {

        try {
            // $rules = [
            //     'menu_data' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            //     'course_type' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            //     'course_duration' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            //     'admission_procedure' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            //     'eligibility' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            //     'preparation' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            //     'publish_date' => 'required',  
            //     ];
            // $messages = [   
            //     'menu_data.required' => 'Please select menu.',
            //     'course_type.required' => 'Please  enter english page content.',
            //     'english_description.required' => 'Please enter marathi page content.',
            //     'english_title.required'=>'Please enter title.',
            //     'english_title.regex' => 'Please  enter text only.',
            //     'english_title.max'   => 'Please  enter text length upto 255 character only.',
            //     'eligibility.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            //     'eligibility.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
            //     'preparation.required' => 'Please content of meta data.',
            //     'preparation.max'   => 'Please  enter meta data length upto 255 character only.',  
            //     'publish_date.required' => 'Please select publish date.',
            // ];
        
            // $validation = Validator::make($request->all(),$rules,$messages);
            // if($validation->fails()) {
            //     return redirect('add-dynamic-page')
            //         ->withInput()
            //         ->withErrors($validation);
            // } else {
                        
                $new_name = '';
                $menu_name = '';
                $publish_date = '';
                $menu_selected = explode("_",$request->menu_data);
                $main_menu_data = $this->getMenuItemsForDynamicPageAdd();
                foreach($main_menu_data as $key=> $data) {
                    if( $menu_selected[0] == $data['menu_id'] && $menu_selected[1] == $data['main_sub']) {
                        $new_name = str_replace(" ","-",$menu_selected[0].'-'.$data['menu_name_english'].'-'.$data['main_sub']);
                        $menu_name = $data['menu_name_english'];
                        $publish_date = $request->publish_date;
                        
                    }
                }
                $this->savePageNameInMenu($menu_selected[1], $menu_id, $new_name,$menu_name,$request);
                

                $msg = "Page data saved successfully";
                $status = "successfully";
                return redirect('list-dynamic-page')->with(compact('msg','status'));
            // }
    
    } catch (Exception $e) {
        return redirect('add-dynamic-page')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $dynamic_page = $this->service->getById($request->show_id);
            return view('admin.pages.dynamic-pages.show-page', compact('dynamic_page'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function edit(Request $request)
    {
        $main_menu_data = $this->getMenuItemsForDynamicPageAdd();
        $edit_data_id = base64_decode($request->edit_id);
        $dynamic_page = $this->service->getById($edit_data_id);
        $menu_selected = $dynamic_page->menu_id.'_'.$dynamic_page->menu_type;

        $edit_data_id = $edit_data_id.'_'.$dynamic_page->menu_type;

        $get_publish_date = $dynamic_page->publish_date;
        $html_marathi = $dynamic_page->page_content_marathi;
        $html_english = $dynamic_page->page_content_english;
        return view('admin.pages.dynamic-pages.edit-page', compact('html_marathi', 'html_english', 'edit_data_id', 'get_publish_date','dynamic_page','main_menu_data','menu_selected'));
    }
    public function update(Request $request) {
       
        try {
           
            $rules = [
                'menu_data' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'course_type' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'course_duration' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'admission_procedure' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'eligibility' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'preparation' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'publish_date' => 'required',  
                ];
            $messages = [   
                'menu_data.required' => 'Please select menu.',
                'course_type.required' => 'Please  enter english page content.',
                'english_description.required' => 'Please enter marathi page content.',
                'english_title.required'=>'Please enter title.',
                'english_title.regex' => 'Please  enter text only.',
                'english_title.max'   => 'Please  enter text length upto 255 character only.',
                'eligibility.required'=>'कृपया शीर्षक प्रविष्ट करा.',
                'eligibility.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
                'preparation.required' => 'Please content of meta data.',
                'preparation.max'   => 'Please  enter meta data length upto 255 character only.',  
                'publish_date.required' => 'Please select publish date.',
            ];
        
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails()) {
                return redirect('edit-dynamic-page')
                    ->withInput()
                    ->withErrors($validation);
            } else {

                $new_name = '';
                $menu_name = '';
                $publish_date = '';
                $menu_selected = explode("_",$request->edit_id);
                $main_menu_data = getMenuItemsDynamicPageDetailsById($menu_selected[0]);
                $new_name = str_replace(" ","-",$main_menu_data->menu_id.'-'.$main_menu_data->menu_name.'-'.$main_menu_data->menu_type);
                $menu_name = $main_menu_data->menu_name;
            
                $this->savePageData($request, $menu_selected, $main_menu_data, $new_name, $menu_name, $publish_date, $main_menu_data->menu_id);
                $msg = "Page data saved successfully";
                $status = "successfully";
                return redirect('list-dynamic-page')->with(compact('msg','status'));

            }

        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    function getMenuItemsForDynamicPageAdd() {


        $menu_data = array();
        $main_menu_data =  MainMenus::where('main_menuses.is_static', '=',false)
                                    ->where('is_active', '=',true)
                                    ->select( 
                                        'main_menuses.menu_name_english',
                                        'main_menuses.url as main_menu_url',
                                        'main_menuses.id as menu_id',
                                        'main_menuses.is_static as main_menu_static',
                                        'main_menuses.main_sub'
                                    )
                                    ->get()
                                    ->toArray();
            
                            
            $subMenus  = MainSubMenus::where('main_sub_menuses.is_static', '=',false)
                                        ->where('is_active', '=',true)
                                        ->select( 
                                            'main_sub_menuses.id as menu_id',
                                            'main_sub_menuses.menu_name_english',
                                            'main_sub_menuses.url as sub_menu_url', 
                                            'main_sub_menuses.is_static as sub_menu_static', 
                                            'main_sub_menuses.main_sub'
                                        )
                                        ->get()
                                        ->toArray();
          
                                        $menu_data = array_merge($main_menu_data, $subMenus);
        return $menu_data ;
        
                    
    }


    function savePageNameInMenu($main_sub, $id, $url, $menu_name, $publish_date, $final_content_english, $final_content_marathi) {


        if($main_sub =='main') {
            $main_menu_data =  MainMenus::where('id', '=', $id)
                                        ->update([ 
                                            'url'=> $url,
                                            'is_static'=> false
                                        ]);
    
            
            $this->addOrUpdateDynamicWebPages($main_sub, $id, $url, $menu_name, $publish_date, $final_content_english, $final_content_marathi);
                
        } else {
            $subMenus  = MainSubMenus::where('id', '=', $id)
                                        ->update([ 
                                            'url'=> $url,
                                            'is_static'=> false
                                        ]);
    
            $this->addOrUpdateDynamicWebPages($main_sub, $id, $url, $menu_name, $publish_date, $final_content_english, $final_content_marathi);
                                       
        }
        return 'ok';
    }


    function addOrUpdateDynamicWebPages($main_sub,$id,$url,$menu_name, $publish_date, $final_content_english, $final_content_marathi) {

        $dynamic_web_page_name = DynamicWebPages::where('is_active',true)
                                                ->where('menu_id',$id)
                                                ->where('menu_type',$main_sub)
                                                ->first();
        if($dynamic_web_page_name) {
            $dynamic_web_page_name = DynamicWebPages::where('is_active',true)
                                                    ->where('menu_id',$id)
                                                    ->where('menu_type',$main_sub)

                                                    ->update([
                                                                'slug'=> $url,
                                                                'menu_name' => $menu_name,
                                                                'publish_date' => $publish_date,
                                                                'actual_page_name_marathi' => $actual_page_name_marathi,
                                                                'actual_page_name_english' => $actual_page_name_english,
                                                                'course_type' =>$course_type,
                                                                'course_duration' =>$course_duration,
                                                                'admission_procedure' =>$admission_procedure,
                                                                'eligibility' =>$eligibility,
                                                                'preparation' =>$preparation,
                                                            ]);
        } else {
            $data_for_insert = [
                'slug'=> $url,
                'menu_id' => $id,
                'menu_name' => $menu_name,
                'publish_date' => $publish_date,
                'actual_page_name_marathi' => $actual_page_name_marathi,
                'actual_page_name_english' => $actual_page_name_english,
                'course_type' =>$course_type,
                'course_duration' =>$course_duration,
                'admission_procedure' =>$admission_procedure,
                'eligibility' =>$eligibility,
                'preparation' =>$preparation,

            ];

            if($main_sub =='main') { 
                $data_for_insert['menu_type']= 'main';     
            } else {
                $data_for_insert['menu_type']= 'sub';   
            }

            $dynamic_web_page_name = DynamicWebPages::insert($data_for_insert);
        }
}

}