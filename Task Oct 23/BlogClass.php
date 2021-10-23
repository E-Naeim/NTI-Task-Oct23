<?php
 require 'database.php';


class blog
{
    private $title;
    private $content;
    private $image;
    private $id;

   

    public function create($val1, $val2, $val3)
    {
        # Create Database Object
        $database_object = new database;
        $this->title     = $val1;
        $this->content   = $val2;
        $this->image     = $val3;
        
        $sql = "insert into blog (title,content,image) values ('$this->title','$this->content','$this->image')";

        $result = $database_object->do_query($sql);

        return $result;
    }

    public function display()
    {
        # Create Database Object
        $database_object = new database;

        $sql = "select * from blog";

        $result = $database_object->do_query($sql);

        return $result;
    }

    public function edit($val1, $val2, $val3, $val4)
    {
        # Create Database Object
        $database_object = new database;

        $this->id       = $val1;
        $this->title    = $val0;
        $this->content  = $val3;
        $this->image    = $val4;

        $sql = "select * from blog where id = $this->id ";

        $result = $database_object->do_query($sql);

        $blog_data = mysqli_fetch_assoc($result);
  
        $sql2 = "update  blog  set title='$this->title', content= '$this->content' image = '$this->image' where id = $this->id";

        $result = $database_object->do_query($sql2);

        return $result;
    }


    public function delete($val1)
    {
        # Create Database Object
        $database_object = new database;

        $this->id = $val1;
    
        $sql = "DELETE  from blog where id = '$this->id'";

        $result = $database_object->do_query($sql);

        return $result;
    }
}
