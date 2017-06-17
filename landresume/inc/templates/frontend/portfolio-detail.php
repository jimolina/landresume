<div id="portfolioModal" class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog h-100" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Portfolio navigation -->
                <div class="mx-auto">
                    <div class="portfolio_nav text-center">
                        <button type="button" class="btn btn-warning previous" data-previous="">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <a href="#" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-times"></i>                        
                        </a>
                        <button type="button" class="btn btn-warning next" data-next="">
                            <i class="fa fa-angle-right"></i>                        
                        </button>                               
                    </div>
                </div>
                <!-- // Portfolio navigation -->
            </div>
            <div class="modal-body">
                <!-- Modal Heading Content -->
                <div class="text-center mb-5">
                    <h1 class="title"></h1>
                </div>
                <!-- // Modal Heading Content -->
                <!-- Content -->
                <div class="row">
                    <div class="col-sm-12 col-md-7 mb-5">
                        <img src="" alt="" class="avatar img-fluid">  
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <h5 class="sub_titles mb-4"><span class="icon-round"><i class="fa fa-clipboard"></i></span> Project Description</h5>
                        <p class="description"></p>
                        <h5 class="sub_titles my-4"><span class="icon-round"><i class="fa fa-list"></i></span> Project Details</h5>
                        <table class="table details table-striped table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td class="width-25 font-weight-bold gray">Date </td>
                                    <td class="width-75 date"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold gray"> Categories </td>
                                    <td class="categories"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold gray">Developed for </td>
                                    <td class="for"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- Button -->
                        <a href="" class="btn btn-outline-warning font-weight-bold w-100 url" target="_blank"><i class="fa fa-eye"></i> Live View</a>
                        <!-- // Button -->
                    </div>
                </div>
                <!-- Content -->
            </div>
            <footer class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"><?php echo esc_attr( get_option( 'portfolio_footer_message' )); ?></h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <h5 class="mb-0"><i class="fa fa-phone"></i> <?php echo esc_attr( get_option( 'portfolio_footer_phone' )); ?></h5>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>