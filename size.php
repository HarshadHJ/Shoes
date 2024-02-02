<div class="form-group" ><!-- form-group Starts -->

<label class="col-md- control-label" >Product Size</label>

<div class="col-md-3" ><!-- col-md-7 Starts -->

<select name="size" id="size" class="form-control" >

 <?php
                            $res=mysqli_query($conn,"select id,size from size order by categories asc");
                            while($row=mysqli_fetch_assoc($res)){
                              if($row['id']==$categories_id){
                                  echo"<option selected value=".$row['id'].">".$row['size']."</option>";

                              }else{
                                   echo"<option value=".$row['id'].">".$row['size']."</option>";
                              }
                             
                            }
                               
                           ?>
</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->