<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <h1>Upload des photos</h1>



        <form ng-submit="addTodos()">        	
	        <input ng-model="myinput" type="text" name="todo" placeholder="Upload une photo" class="form-control input-lg">
        </form>             
    </div>


    <div class="col-lg-8 col-lg-offset-2">
    <br />
		<uib-tabset type="pills">
		    <uib-tab heading="Photos en attente">
		    	<h3>Photos en attente</h3>

		    	<div class="row text-center" ng-hide="anyActiveTodos">
		    		<div class="col-md-12">
		    			<img src="../content/images/Status_-_Active.png" height="250">
		    		</div>
		    		<div class="col-md-12">
		    			<h3>Pas de photos en attente</h3>
		    			<h4>Toutes vos photos sont disponibles</h4>
		    		</div>
		    	</div>

		    	<div class="col-lg-offset-1" ng-show="anyActiveTodos">
			    	<ul ng-repeat="list in lists" style="list-style-type: none;">
			    		<li>
				    		<div class="row">
				    			<div class="col-md-4">
				    				<input type="checkbox" name="check" ng-model="list.IsDone" ng-click="done(list)">
				    		<!-- 	<span ng-class="{'task-crossout': list.IsDone}"> {{list.TodoName}} </span>
                                     <span ng-class="{'task-crossout': list.Accepted}"> {{list.TodoName}} </span> -->
                                    <img  ng-class="{'task-crossout': list.IsDone}" src="{{list.TodoName}}" height="250">
				    			</div>
			    			</div>
			    		</li>
			    	</ul>
		    	</div>
		    </uib-tab>
		    <uib-tab heading="En cours de validation">
		    	<h3>En cours de validation</h3>
		    	<div class="col-lg-offset-1">
			    	<ul ng-repeat="list in completedTodos | filter:call " style="list-style-type: none;">
			    		<li>
				    		<div class="row">
				    			<div class="col-md-4">
                                    <!-- <span ng-class="{'task-crossout': list.IsDone}"> {{list.TodoName}} </span> -->
                                    <img src="{{list.TodoName}}" height="250">
                                    <img src="{{list.img}}" height="250">

				    			</div>
			    			</div>
			    		</li>
			    	</ul>
		    	</div>
		    </uib-tab>
		    <uib-tab heading="Toutes les photos">
		    	<h3>Toutes les photos</h3>
		    	<div class="col-lg-offset-1">
			    	<ul ng-repeat="list in acceptedTodos" style="list-style-type: none;">
			    		<li>
				    		<div class="row">
				    			<div class="col-md-4">
                                    <!--<input type="checkbox" name="check" ng-model="list.IsDone" ng-click="done(list)" ng-show="!list.IsDone"> -->
                                    <!-- <span ng-class="{'task-crossout': list.IsDone}"> {{list.TodoName}} </span> -->
                                    <img src="{{list.TodoName}}" height="250">
				    			</div>
			    			</div>
			    		</li>
			    	</ul>
		    	</div>
		    </uib-tab>
		    
		</uib-tabset>

    	
    </div>
</div>
