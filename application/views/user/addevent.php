
            <div class="messagedisplay"></div>
            <div class="form-in">
            	<div class="row2">
                    <label>Titile</label>
                    <input class="input" type="text" placeholder="e.g Monthly Meetup" name="title" value="">
                   
                </div>
                <div class="row2">
                    <label>Sub-Title</label>
                    <input class="input" name="subtitle" type="text" placeholder="e.g This meeting will mainly be about the future of the church" value="">
                     
                </div>
                <div class="row2">
                    <label>Description</label>
                    <textarea id="myTextArea" name="description" cols="" rows="" class="textarea" placeholder="This meeting is about …"></textarea>
                   
                </div>
                <div class="main-row">
                	<div class="col">
                        <label>Set Location</label>
                        <input class="input" type="text" name="location" placeholder="e.g Divince Church Premise" value="">
                        
                    </div>
                    <div class="col col2">
                        <label>Attachements</label>
                        <div class="upload-btn btn-primary">
                            <span>+</span>
                            <input type="file" class="upload" name="eventimage" />
                        </div>
                	</div>
                </div>
               
               	<div class="main-row start">
                	<div class="col">
                    	<label>Starts </label>
                        <input class="input ddcalendar" type="text" placeholder="Set Date" name="startdate">
                         
                    </div>
                    <div class="col2">
                    	<label>Ends</label>
                        <input class="input ddcalendar1" type="text" placeholder="Set Date" name="enddate">
                         
                    </div>
                </div>
            </div>
            <div class="row">
                
                 <a href="#" class="btn-addnew" onclick="saveevent('<?php echo $this->input->post('productid')?>')">Submit</a>
            </div>
            



