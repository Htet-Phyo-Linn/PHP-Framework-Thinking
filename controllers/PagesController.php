<?php
    class PagesController{
        public function home(){
            $tasks = App::get("database")->selectAll("tasks");
            view('Index', [
                "tasks"=>$tasks
            ]);
        }

        public function about(){
            view("About");
        }

        public function contact(){
            view("Contact");
        }

        public function names(){
            App::get("database")->insert([
                'name'=>request('name')
            ], "users");
            
            redirect("");
        }
    }
?>