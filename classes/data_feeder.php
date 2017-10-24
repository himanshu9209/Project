<?php


class dataFeeder
{
	
	static $inst;
	public $repos;
	

	function __construct()
	{
		
		//## invoke Github API and search for php repo with most stars in desc order 
		$client = new \Github\Client();
		$this->repos = $client->api('search')->setPerPage(100)->repositories('php','stars','desc');
		
		
		$this->repos = $this->repos['items'];
		
		
		//echo '<pre>';
		//print_r($this->repos);
		//echo '</pre>';
		//exit;
	
		
		$this->LoadIntoDb();
			
	}
	
	public function LoadIntoDb()
	{
			
		
		$repo_query = new RepositoriesQuery();
			
		
		for($i=0;$i<count($this->repos);$i++)
		{
			
			$id = $this->repos[$i]['id'];
			$name =  $this->repos[$i]['name'];
			$description = $this->repos[$i]['description'];
			$url = $this->repos[$i]['html_url'];
						
			$a = new DateTime($this->repos[$i]['created_at']);
			$created_date = $a->format("m/d/Y");
			
			$a = new DateTime($this->repos[$i]['pushed_at']);
			$pushed_date = $a->format("m/d/Y");
			
			$stars = $this->repos[$i]['watchers'];
	
			//### Update if record is already in DB ###//
			$existing_record = $repo_query->findPK($this->repos[$i]['id']);
			
			if($existing_record)
			{
				
				$existing_record->setName($name);
				$existing_record->setUrl($url);
				$existing_record->setCreatedDate($created_date);
				$existing_record->setLastPushDate($pushed_date);
				$existing_record->setDescription($description);
				$existing_record->setStars($stars);
				$existing_record->save();
				unset($existing_record);
				
			//### End Updatingif record is already in DB ###//	
			}
			else	//## Insert record if not in DB ##//
			{
				
				
				$repoObj = new Repositories();
				$repoObj->setRepositoryId($id);
				$repoObj->setName($name);
				$repoObj->setUrl($url);
				$repoObj->setCreatedDate($created_date);
				$repoObj->setLastPushDate($pushed_date);
				$repoObj->setDescription($description);
				$repoObj->setStars($stars);
				$repoObj->save();	
			}
			
			//## End inserting new record ##//

			
		}
	}
	
}



?>