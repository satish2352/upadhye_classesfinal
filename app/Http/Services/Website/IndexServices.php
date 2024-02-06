<?php
namespace App\Http\Services\Website;

use App\Http\Repository\Website\IndexRepository;
// use App\Marquee;
use Carbon\Carbon;


class IndexServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new IndexRepository();
    }
    

    // public function getAllMaequee($request)
    // {
    //     try {
    //         return $this->repo->getAllMaequee($request);
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // } 


    public function getAllSocialIcon()
    {
        try {
            return $this->repo->getAllSocialIcon();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllSlider()
    {
        try {
            return $this->repo->getAllSlider();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllCoursesOffered()
    {
        try {
            return $this->repo->getAllCoursesOffered();
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function getAllUpcomingCourses()
    {
        try {
            return $this->repo->getAllUpcomingCourses();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllTestimonial()
    {
        try {
            return $this->repo->getAllTestimonial();
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function getAllDisasterManagementNews()
    {
        try {
            return $this->repo->getAllDisasterManagementNews();
        } catch (\Exception $e) {
            return $e;
        }
    }    
    public function getAllEmergencyContact()
    {
        try {
            return $this->repo->getAllEmergencyContact();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getLimitDepartmentInformation()
    {
        try {
            return $this->repo->getLimitDepartmentInformation();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllDepartmentInformation()
    {
        try {
            return $this->repo->getAllDepartmentInformation();
        } catch (\Exception $e) {
            return $e;
        }
    } 


    public function getById($id)
    {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function getAllWebDisaterForcast ()
    {
        try {
            return $this->repo->getAllWebDisaterForcast ();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getByIdDepartmentInformation($id)
    {
        try {
            return $this->repo->getByIdDepartmentInformation($id);
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getByIdDisasterForecast($id)
    {
        try {
            return $this->repo->getByIdDisasterForecast($id);
        } catch (\Exception $e) {
            return $e;
        }
    }     
    

    public function getallVacancies()
    {
        try {
            return $this->repo->getallVacancies();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function getAllRTI()
    {
        try {
            return $this->repo->getAllRTI();
        } catch (\Exception $e) {
            return $e;
        }
    }  

    public function getPrivacyPolicy()
    {
        try {
            return $this->repo->getPrivacyPolicy();
        } catch (\Exception $e) {
            return $e;
        }
    }  

    public function getTermCondition()
    {
        try {
            return $this->repo->getTermCondition();
        } catch (\Exception $e) {
            return $e;
        }
    }

    
    public function getAllDisaterForcast()
    {
        try {
            return $this->repo->getAllDisaterForcast();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    // =============
    // public function showParticularCourseDetails($id)
    // {
    //     try {
    //         $courseDetails = $this->repo->showParticularCourseDetails($id);
            
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // } 

    public function showParticularCourseDetails($id)
{
    try {
        $courseDetails = $this->repo->showParticularCourseDetails($id);
        return $courseDetails; // Return the fetched course details
    } catch (\Exception $e) {
        // Handle exceptions
        return null; // or throw $e; depending on your requirement
    }
}

    public function showParticularUpcomingCourseDetailsDetails()
    {
        try {
            return $this->repo->showParticularUpcomingCourseDetailsDetails();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    

    public function getAllMarquee($request)
    {
        try {
            return $this->repo->getAllMarquee($request);
        } catch (\Exception $e) {
            return $e;
        }
    } 
}