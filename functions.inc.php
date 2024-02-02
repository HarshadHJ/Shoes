<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}
function get_safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}



function get_product($conn,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order='',$is_best_seller='',$sub_categories=''){
	$sql="select product1.*,categories.categories from product1,categories where product1.status=1 ";
	if($cat_id!=''){
		$sql.=" and product1.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product1.id=$product_id ";
	}
	if($sub_categories!=''){
		$sql.=" and product1.sub_categories_id=$sub_categories ";
	}
	if($is_best_seller!=''){
		$sql.=" and product1.best_seller=1 ";
	}
	$sql.=" and product1.categories_id=categories.id ";
	if($search_str!=''){
		$sql.=" and (product1.product_name like '%$search_str%' or product1.product_desc like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=" order by product1.id desc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($conn,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
?>