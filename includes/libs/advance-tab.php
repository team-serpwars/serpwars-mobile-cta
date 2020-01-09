<?php

     $item->settings = json_decode($item->settings);
     if(!isset($item->settings->page_settings)){
          $item->settings = (object) array();
          $item->settings->page_settings = array();
     }

     $data = json_encode($item->settings->page_settings);

     // print_r($item->settings);
?>
<div class="ca_marketing_com_wrap">
<label>Select Page</label>	
     <textarea class= "ca_ma_com_selected" name="ca_ma_com_selected" style="display: none;"><?php echo $data;?></textarea>
     <div class="ca_ma_com_selected_input_query_wrap">
          <input type="text" class="ca_ma_com_selection_input_query" placeholder="Seach Title of a module">
          <div class="ca_ma_com_selection_input_results"></div>          
    </div>

    <div class="ca_ma_com_tags">
      	<ul></ul>
    </div>   
</div>

<script>

</script>