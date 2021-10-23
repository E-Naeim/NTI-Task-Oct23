<?php
 require 'dbclass.php';


class blog
{
    private $title;
    private $content;
    private $image;
    private $id;

   

    public function create($val1, $val2, $val3)
    {
        # Create Database Object
        $dbObj = new DataBase;
        $this->title    = $val1;
        $this->content  = $val2;
        $this->image    = $val3;
        

        $sql = "insert into blog (title,content,image) values ('$this->title','$this->content','$this->image')";

        $result = $dbObj->do_query($sql);

        return $result;
    }

    public function display()
    {
        # Create Database Object
        $dbObj = new DataBase;

        $sql = "select * from blog ";

        $result = $dbObj->do_query($sql);

        return $result;
    }

 
    public function edit($val1, $val2, $val3, $val4)
    {
        # Create Database Object
        $dbObj = new DataBase;
        $this->title    = $val1;
        $this->content  = $val2;
        $this->image    = $val3;
        $this->id       = $val4;
    
        $sql = "select * from blog where id = $this->id ";

        $result = $dbObj->do_query($sql);

        $blog_data = mysqli_fetch_assoc($result);
  
        $sql2 = "update  blog  set title='$this->title', content= '$this->content' image = '$this->image' where id =$this->id";

        $result = $dbObj->do_query($sql2);

        return $result;
    }


    public function delete($val4)
    {
        # Create Database Object
        $dbObj = new DataBase;

        $this->id=$val4;
    
        $sql = " DELETE  from blog where id ='$this->id' ";

        $result = $dbObj->do_query($sql);

        return $result;
    }
}
