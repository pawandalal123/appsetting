<!doctype html>
<html>
    <head>
        <title>Demo for CodeIgniter Pagination :: Demo cho việc phân trang trong CodeIgniter</title>
        <meta charset="utf-8" />
        <style>
            td{
                text-align: center;
            }
            td{
                border-top: 1px solid #ccc;
            }
            table{
                margin: 1em;
            }
        </style>
    </head>
    <body>
      
        <?php

        // generate the table
       // $this->table->set_heading('ID', 'ITEM CODE', 'QUANTITY','QUANTITYf');
      //  echo $this->table->generate($datatable);
	   $datatable = $this->common->get_items(5, $this->uri->segment(3));
	     pr($datatable);
		foreach($datatable as $datatabl)
		{
			echo $datatabl->id;
		}

        // generate the page navigation

        echo $this->pagination->create_links();
        ?>
    </body>
</html>