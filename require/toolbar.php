  <ul class="toolbar">
    <li class="toolbar-item"><a class="toolbar-item" href="/index.php" style="font-size:18px">&nbsp;&nbsp;&nbsp;fiddleit</a></li>
    <li class="toolbar-item"><a class="toolbar-item"><select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
      <?php foreach(  $langs as $option  ) : ?>
        <option value="/index.php?lang=<?php echo $option["code"] ?>" <?php if($lang == $option["code"]){echo "selected";} ?>><?php echo strtoupper($option["code"]) ?></option>
      <?php endforeach ?>
    </select></a></li>
  </ul>