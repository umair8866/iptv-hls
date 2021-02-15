@include('admin/includes/header')
@include('admin/includes/sidebar')   

<div class="page-container">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a href="{{url('/admin/channels')}}"><button class="btn btn-info">All Channels</button></a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <strong>Add Channel</strong>
                </div>
                <div class="card-body card-block">
                <form action="{{url('/admin/addnewchannel')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <div class="col col-md-5">
                        <label for="text-input" class=" form-control-label">Channel Name</label>
                    </div>
                    <div class="col-12 col-md-12">
                        <input type="text" id="chanelname" name="chanelname" placeholder="Channel Name" class="form-control" required>
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col col-md-5">
                        <label for="text-input" class=" form-control-label">Channel Hls Url</label>
                    </div>
                    <div class="col-12 col-md-12">
                        <input type="text" id="chnlurl" name="chanelurl" placeholder="Channel Url Here" class="form-control" required>
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col col-md-5">
                        <label for="text-input" class=" form-control-label">Channel Logo</label>
                    </div>
                    <div class="col-12 col-md-12">
                        <input type="file" id="logo" name="logo" class="form-control" required>
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-12 col-md-12">
                        <input type="submit" id="submit" name="submit" class="btn btn-block btn-primary" value="Save">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('admin/includes/footer')