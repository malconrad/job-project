<?php include_once 'config/init.php';?>
<?php
$jobs = new Job;
$search = "";
$location="";
$template = new Template('templates/frontpage.php');
$template->jobs = $results = [];
$template->title ="";
    // pagenation
$pageNum = 3;
if(isset($_GET["page"])){
    $page = (int) filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
}else{
    $page = 1;
}
$startFrom = ($page-1)*3;

    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
    $template->category = $category = (int) filter_input(INPUT_GET, 'category', FILTER_SANITIZE_NUMBER_INT);
    $template->location = $location =  filter_input(INPUT_GET, 'location', FILTER_SANITIZE_STRING);

        if(!empty($search)){
            if(is_array($jobs->searchResult($search))){

                    $template->title = "Search results";
                    $results = $jobs->searchResult($search);
                    $template->jobs = array_slice($results,$startFrom,$pageNum);
                
                    }else{
                    $template->title = "No search results";
                   
                }
                    

        } elseif($category && !strlen($location)){

                $template->title = 'Jobs in '. $jobs->getCategory($category)->name;     
                $results = $jobs->getByCategory($category);
                $template->jobs = array_slice($results, $startFrom, $pageNum);

         } elseif($location && !$category){

                if(is_array($jobs->locationAll($location))){
                    $results = $jobs->locationAll($location);
                    $template->title = 'Jobs in '. $results[0]->location;
                    $template->jobs = array_slice($results, $startFrom, $pageNum);
                    
                }
               
            } elseif ($category && $location){
             
                if(is_array($jobs->getSpecJobs($category, $location))){
                    $results = $jobs->getSpecJobs($category, $location);
                    $template->title =  $results[0]->cname .' jobs in '. $results[0]->location;
                    $template->jobs = array_slice($results, $startFrom, $pageNum);
                } else{
                    $template->title ="No Jobs within Area";
                }
               
                
            } else {

                if(!$category && !strlen($location)&& !$search ){
                    $template->title = "Recent updates";

                    $results = $jobs->getAllJobs();
                    $template->jobs = array_slice($results, $startFrom, $pageNum);
                }
            }
        
               
                  
        

    

$template->categories = $jobs->getCategories();
$template->locations = $jobs->getLocations();
$totalPage = ceil(count($results) / $pageNum);
$template->page = $page;
$template->links = $totalPage;


echo $template;

?>