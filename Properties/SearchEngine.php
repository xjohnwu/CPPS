<?php
function getOptionValueFromPrice($from, $to, $increment, $prefix, $subfix)
{
	$str = "";
	for ($i=$from; $i<=$to; $i=$i+$increment)
	{
		$str .= sprintf("<option value='%s'>%s%s%s</option>", $i, $prefix, number_format($i), $subfix);
	}
	return $str;
}
?>

<script type="text/javascript" src="JQuery/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#search_type").change(function(e) {
    var changed = $(e.target);
    if (changed.val() == "forsale")
	{
		$(".forsale_attribute").removeClass("none");
		$(".forrent_attribute").addClass("none");
		$("#forrent_price_min").attr("disabled", "disabled");
		$("#forrent_price_max").attr("disabled", "disabled");
		$("#forsale_price_min").removeAttr("disabled", "disabled");
		$("#forsale_price_max").removeAttr("disabled", "disabled");		
	}
	else if (changed.val() == "forrent")
	{
		$(".forsale_attribute").addClass("none");
		$(".forrent_attribute").removeClass("none");
		$("#forrent_price_min").removeAttr("disabled", "disabled");
		$("#forrent_price_max").removeAttr("disabled", "disabled");
		$("#forsale_price_min").attr("disabled", "disabled");
		$("#forsale_price_max").attr("disabled", "disabled");
	}
  });
});
</script>

<div id="search">
	<div id="search-inner">
        <form name="form_search" id="form_search" action="Properties/do_search.php">
                <input id="search_field" value=""/>
                <button class="interface" type="submit" value="Search" id="search-button">Search</button>
                <div id="search_attributes">
                    <ol>
                    	<li>
                        	<label for="search_type">For</label>
                        	<select name="search[for]" id="search_type">
                            	<option value="sale">Sale</option>
                            	<option value="rent">Rent</option>                                
                            </select>
                        </li>
                        <li class="forsale_attribute">
                            <label for="forsale_price_min">Min price</label>
                            <select name="search[price_min]" id="forsale_price_min" class="selectbox">
                                <option value="">No min</option>
                                <?php echo getOptionValueFromPrice(10000, 250000, 10000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(275000, 500000, 25000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(550000, 1000000, 50000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(1100000, 2500000, 100000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(2750000, 5000000, 250000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(5500000, 10000000, 500000, "£", ""); ?>
                            </select>
                        </li>
                        <li class="forsale_attribute">
                            <label for="forsale_price_max">Max price</label>
                            <select name="search[price_max]" id="forsale_price_max" class="selectbox">
                                <option value="">No max</option>
                                <?php echo getOptionValueFromPrice(10000, 250000, 10000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(275000, 500000, 25000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(550000, 1000000, 50000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(1100000, 2500000, 100000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(2750000, 5000000, 250000, "£", ""); ?>
                                <?php echo getOptionValueFromPrice(5500000, 10000000, 500000, "£", ""); ?>
                            </select>
                        </li>
                        <li class="forrent_attribute none">
                            <label for="forrent_price_min">Min price</label>
                            <select name="search[price_min]" id="forrent_price_min" class="selectbox" disabled="disabled">
                                <option value="">No min</option>
                                <?php echo getOptionValueFromPrice(100, 1000, 100, "£", " pcm"); ?>
                                <?php echo getOptionValueFromPrice(1250, 5000, 250, "£", " pcm"); ?>
                                <?php echo getOptionValueFromPrice(5500, 25000, 500, "£", " pcm"); ?>
                            </select>
                        </li>
                        <li class="forrent_attribute none">
                        <label for="forrent_price_max">Max price</label>
                        <select name="search[price_max]" id="forrent_price_max" class="selectbox" disabled="disabled">
                                <option value="">No max</option>
                                <?php echo getOptionValueFromPrice(100, 1000, 100, "£", " pcm"); ?>
                                <?php echo getOptionValueFromPrice(1250, 5000, 250, "£", " pcm"); ?>
                                <?php echo getOptionValueFromPrice(5500, 25000, 500, "£", " pcm"); ?>
                            </select>
                        </li>
                        <li>
                            <label for="property_type">Type</label>
                            <select name="search[type]" id="property_type" class="text">
                                <option value="" selected="selected">Show all</option>
                                <option value="house">Houses</option>
                                <option value="flat">Flats</option>
                            </select>
                        </li>
                        <li>
                            <label for="beds_min" id="search_beds">Beds</label>
                            <select name="search[beds_min]" id="beds_min" class="text">
                                <option value="" selected="selected">No min</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                                <option value="5">5+</option>
                            </select>
                        </li>
                    </ol>
                </div>
        </form>
	</div>
</div>