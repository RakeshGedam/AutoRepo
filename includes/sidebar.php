
<style>
    #manufacturerList::-webkit-scrollbar {
    width: 0;  /* Invisible scrollbar */
}
</style>
<div class="panel panel-default sidebar-menu"><!--22-->
    <div class="panel-heading">
        <h3 class="panel-title">Product Categories</h3>        
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <?php
                getPCats();
            ?>
        </ul>
    </div>
</div>

<div class="panel panel-default sidebar-menu"><!--22-->
    <div class="panel-heading">
        <h3 class="panel-title">Manufacturers</h3>        
    </div>
    <div class="panel-body">
        <!-- Search Bar -->
        <input type="text" id="searchBox" class="form-control" placeholder="Search manufacturers...">

        <ul id="manufacturerList" class="nav nav-pills nav-stacked category-menu" style="max-height: 300px; overflow-y: auto;">
            <?php getMan(); ?>
        </ul>
    </div>
</div>

<script>
    // Search Functionality for Manufacturer List
    document.getElementById("searchBox").addEventListener("keyup", function () {
        let filter = this.value.toLowerCase();
        let items = document.querySelectorAll("#manufacturerList li");

        items.forEach(function (item) {
            let text = item.textContent || item.innerText;
            item.style.display = text.toLowerCase().includes(filter) ? "" : "none";
        });
    });
</script>


<div class="panel panel-default sidebar-menu"><!--22-->
    <div class="panel-heading">
        <h3 class="panel-title">Vehicle Type</h3>        
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
        <li><a href='shop.php?cat_id=$cat_id'><img src='./admin_area/mpImg/check/$cat_img' style='width: 50px; margin-right: 5px;'>EVs</a></li>
        <li><a href='shop.php?cat_id=$cat_id'><img src='./admin_area/mpImg/check/$cat_img' style='width: 50px; margin-right: 5px;'>NON-EVs</a></li>
        </ul>
    </div>
</div>