<header>
    <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
        <div class="container navbar-container" style="padding: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}" style="margin-left: 0;">IIPA <span>Magazine</span></a>

                <!-- Trigger the modal with a button -->
                <a href="javascript:void(0)" class="searcMagazineModalBtn search_btn_nav" data-toggle="modal" data-target="#searcMagazineModal">
                    <img src="{{ asset('images/search_icon.png') }}">
                </a>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('index') }}">Magazines</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            
            <!-- <div class="top-social">
                <ul id="top-social-menu">
                    <li><a href="https://twitter.com/iipa9/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.youtube.com/results?search_query=iipa" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="#">IIPA</a></li>
                </ul>
            </div> -->

        </div>
    </nav>
</header>

<!-- Modal -->
<div class="modal fade" id="searcMagazineModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        
        <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div> -->

        <div class="modal-body nav_modal">
          <form action="{{ route('search_data') }}" method="post">
            @csrf
            <div class="row">
                
                <select class="searchbar searchtype" id="searchtype_select" name="type" required>
                    <option value="">Please Select</option>
                    <option value="magazine_title">Name of Magazine</option>
                    <option value="magazine_date">Date of Publication</option>
                    <option value="magazine_month">Month of Publication</option>
                    <option value="magazine_year">Year of Publication</option>
                    <!-- <option value="magazine_title">Subject</option> -->
                    <option value="article_title">Article Title</option>
                    <option value="magazine_editor">Author Name</option>
                </select>
                
                <input class="searchbar searchtext" type="text" name="search" placeholder="Type to search..." class="searchbar">
                
                <div class="searcMagazineModalBtn">
                    <button type="button" class="close_modal">
                        <img src="{{ asset('images/close_icon.png') }}">
                    </button>
                    <button type="submit" class="search_btn"><img src="{{ asset('images/search_icon.png') }}"></button>
                </div>

            </div>
          </form>
            
        </div>
        
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->

      </div>
      
    </div>
</div>

<section id="searchtype_select_container">
    <ul></ul>
</section>
<input type="hidden" value="{{ route('article', '') }}" id="magazine_route">

@push('scripts')
    <script type="text/javascript">
        $('.close_modal').on('click', function(){
            $('#searcMagazineModal').modal('hide');
        })

        $('#searcMagazineModal').on('hidden.bs.modal', function () {
            $('#searchtype_select_container').hide(0)
            $('.searchbar.searchtext').val("");
            $('#searchtype_select').val("")
        })

        $('#searchtype_select').on('change', function(){
            if(this.value != ""){
                getSearchContainerData(this.value)
                $('#searchtype_select_container').fadeIn(500)
            }
            else
                $('#searchtype_select_container').hide(0)
        })
        function getSearchContainerData(type){
            let anchor = $('#magazine_route').val();
            let parameters = "";

            $.get("/api/getSearchData",
            {
                type: type
            },

            function(data, status){
                // console.log(status)
                // console.log(data)
                if(status == 'success' && data.status){
                    let li = "";
                    $.each(data.data, function(index, item) {
                        parameters = ""
                        
                        if(type == 'magazine_title')
                            parameters += "/"+item.id;
                        else if(type == 'magazine_editor')
                            parameters += "/"+item.blog_id+"?article_id="+item.id;

                        if(item.title)
                            li += `<li><a href="${anchor}${parameters}">${item.title}</a></li>`;
                    });
                    $('#searchtype_select_container ul').html(li);
                }
            });
        }

    </script>
@endpush