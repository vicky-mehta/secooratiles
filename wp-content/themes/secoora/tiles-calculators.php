<?php
/*
Template Name: Tiles calculator
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

//get_header(); ?>
            <div class="col-md-12 clearfix">
            	<?php the_content(); ?>
					<script language="javascript">		
                        function isNumber(inputStr) {
                            for (var i = 0; i < inputStr.length; i++) {
                                var oneChar = inputStr.substring(i, i + 1);
                                if ((oneChar < "0" || oneChar > "9") && oneChar != ".") {
                                    return false;
                                }
                            }
                            return true;
                        }
                    
                        function doCalc(){
                            var rw = document.forms['calc'].elements['rw'].value;
                            var rl = document.forms['calc'].elements['rl'].value;
                            var tw = 0;
                            var tl = 0;
                            var sz = document.forms['calc'].elements['mm'].value;
                            
                            var myarr = sz.split("_x_");
							/* if size in cm */
                            sz = parseInt(myarr[0]) * parseInt(myarr[1]) * 100;
							/* if size in mm */
							//sz = parseInt(myarr[0]) * parseInt(myarr[1]);
                           	//console.log(sz);
                            
                    
                    
                            if (!isNumber(rw) || !isNumber(rl)){
                                alert("Please enter numbers only.");
                                return false;
                            }
                    
                            if (rw<1 || rl<1){
                                alert("Please enter value greate than zero.");
                                return false;
                            }
                    
                            if (sz < 1){
                                alert("Please select size.");
                                return false;
                            }
                    
                            var totalTiles = 0;
                            var totalArea = 0;
                    
                            totalArea = rw*rl;
                            //rw = rw*304.8;
                            //rl = rl*304.8;
							
							rw = rw*300;
                            rl = rl*300;
                    
                            /*
                            if((rw%tw)==0){
                                xt = (rw/tw);
                            }else{
                                xt = parseInt(rw/tw)+1;
                            }
                            if((rl%tl)==0){
                                yt = (rl/tl);
                            }else{
                                yt = parseInt(rl/tl)+1;
                            }
                            totalTiles = xt*yt;
                            totalArea = (xt*tw)*(yt*tl);
                            */
                    
                            if ((rw*rl)%sz == 0){
                                totalTiles = (rw*rl)/sz;
                            }else{
                                totalTiles = parseInt((rw*rl)/sz)+1;
                            }
                    
                            totalTiles = Math.round(totalTiles);
                    
                            document.forms['calc'].elements['tn'].value = totalTiles;
                            document.forms['calc'].elements['ta'].value = totalArea;
                            //document.forms['calc'].elements['ta'].value = Math.round(totalArea/8);
                    
                            return true;
                        }
                    
                    </script>
                    
                    <form role="form" id="calc" name="calc" method="get" action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rw">Room Width&nbsp;(ft)&nbsp;:</label>
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrows-h"></i></span>
                                    <input type="number" class="form-control" id="rw" name="rw" placeholder="Room Width">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rl">Room Length&nbsp;(ft)&nbsp;:</label>
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrows-v"></i></span>
                                    <input type="number" class="form-control" id="rl" name="rl" placeholder="Room Length">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mm">Tiles Size&nbsp;(mm)&nbsp;:</label>
                                    <?php
										$option=get_option('option_tree_settings');
										$values=array();
										$labels=array();
										//wp_list_categories();
										foreach($option['settings'][0]['choices'] as $va){
											if($va['value'] <> "null") {
												$values[]=$va['value'];
												//var_dump($va);
												//$labels[]['label']=$va['label'];
												//$labels[]['value']=$va['value'];
												$labels[]=$va;
											}
											
										}		
										//var_dump($labels);							
                                        //var_dump($values);
                                    ?>
                                    <select class="cmb form-control" name="mm" type="option">
                                        <option value="0">Select Size</option>
                                        <?php foreach($labels as $label) : ?>
                                        <option value="<?php echo $label['value']; ?>"><?php echo $label['label']; ?></option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-6">
                                <button type="button" onclick="doCalc();" class="btn btn-primary btn-lg" name="btnCalc"><i class="icon-ok"></i> Calculate</button>
                                <!--<input type="button" onclick="doCalc();" class="btn btn-primary btn-lg" value="Calculate" name="btnCalc">-->
                                <button type="reset" class="btn btn-danger btn-lg" name="btnClear"><i class="icon-refresh"></i> Clear</button>
                                <!--<input type="reset" class="btn btn-warning btn-lg" value="Clear" name="btnClear">-->
                            </div>
                            <div class="clearfix"></div>
                            <div class="space10"></div>
                            <div class="col-md-12"><hr /></div>
                            <div class="space10"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tn">Total Tiles Need (Approx.):</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon "><i class="fa fa-th"></i></span>
                                        <input type="text" class="form-control" value="" name="tn" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ta">Total Tiles Area (ft) :</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><i class="fa fa-dropbox"></i></span>
                                        <input type="text" class="form-control" value="" name="ta" disabled>
                                    </div>       
                                </div>        
                            </div>        
                            <div class="clear"></div>
                                       
                        
                        </div>
                    </form>                
            </div>
		
