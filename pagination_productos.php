<?php
 if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
	include("conn.php");
	
 
	
	 
	$query=mysqli_query($conn,"select count(id_producto) from `producto` where id_categoria='".$_GET['id1']."'" );
	$row = mysqli_fetch_row($query);

	$rows = $row[0];
	
	$page_rows = 5;

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"select a.imagen, e.categoria, a.item, b.color, c.material, a.tipo
from producto a, color b, material c, categoria e
where a.id_color=b.id_color
and a.id_material=c.id_material
and a.id_categoria=e.id_categoria
and a.id_categoria='".$_GET['id1']."'
group by a.item
 $limit");
	$paginationCtrls = '';

	if($last != 1){
		
	
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?id1='.$_GET['id1'].'&categoria='.$_GET['categoria'].'&pn='.$previous.'" class="btn btn-default">&laquo;</a>     ';
		
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?id1='.$_GET['id1'].'&categoria='.$_GET['categoria'].'&pn='.$i.'" class="btn btn-default">'.$i.'</a>   ';
			}
	    }
    
	


	     $paginationCtrls .= ' <a href=""  class="btn btn-primary">'.$pagenum.'</a> ';

	
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?id1='.$_GET['id1'].'&categoria='.$_GET['categoria'].'&pn='.$i.'" class="btn btn-default">'.$i.'</a>   ';
		if($i >= $pagenum+4){
			break;
		}
	}

  
        $next = $pagenum + 1;
        $paginationCtrls .= ' <a href="'.$_SERVER['PHP_SELF'].'?id1='.$_GET['id1'].'&categoria='.$_GET['categoria'].'&pn='.$next.'"  class="btn btn-default">&raquo;</a> ';
    
	}

?>