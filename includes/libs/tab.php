  <div class="row" v-show="list1.length>0">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active"  href="#test1">Component</a></li>
        <li class="tab col s3"><a  href="#test2">Advance</a></li>
        <!-- <li class="tab col s3"><a href="#test3">Pressed</a></li> -->
      </ul>
    </div>
    <div class="col s12">      
      <a href="#" class='btn pull-right  red darken-3 waves-effect' title="Remove this Item" v-on:click="removeItem(current_item)">
          <i class="fa fa-times-circle"></i>
        </a>
    </div>
    <div id="test1" class="col s12">

    <div class="tab-content">     
      <?php require_once("normal-accordion.php");?>
    </div>
  </div>
    <div id="test2" class="col s12">
    <div class="tab-content">     
      <?php require_once("advance-tab.php");?>
    </div>
  </div>
    <div id="test3" class="col s12">
    <div class="tab-content">     
      <?php //require_once("pressed-accordion.php");?>
    </div>
  </div>
  </div>