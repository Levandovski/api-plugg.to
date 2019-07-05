<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorApi extends Controller
{
    public function dadosApiJson(){      
        //Verificando os próximos dados a serem exibidos
        if(!isset($page)){
            $page=1;
        }
        if(isset($_GET['page_current']) && isset($_GET['page_new']) && is_numeric($_GET['page_current']) && is_numeric($_GET['page_new']) && $_GET['page_new']==1){
            $pageCurrent=(int) $_GET['page_current'];
            $page=$pageCurrent+1;          
        }else if(isset($_GET['page_current']) && isset($_GET['page_new']) && is_numeric($_GET['page_current']) && is_numeric($_GET['page_new']) && $_GET['page_new']==0){
            $pageCurrent=(int) $_GET['page_current'];
            $page=$pageCurrent-1;         
            if($page==0){
                $page=1;               
            }
        }
        //Fazendo as requisições da API no Site        
        $url="https://swapi.co/api/people/$page/";
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result= curl_exec($ch);
        $result=json_decode($result);        
        curl_close($ch);
        //Verificando dados vazios  
        if(isset($result->detail)){
            $not_found=1;
        }else{
            $not_found=0;
        }
        return view('inicio', compact('result','not_found', 'page'));
    }   
}
