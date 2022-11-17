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
                <a href="javascript:void(0)" class="searcMagazineModalBtn" data-toggle="modal" data-target="#searcMagazineModal">
                    <img src="{{ asset('images/search_icon.png') }}">
                </a>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('index') }}">Magazines</a></li>
                    <li><a href="#">About Us</a></li>
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

        <div class="modal-body">
          <form action="{{ route('search_data') }}" method="post">
            @csrf
            <div class="row">
                
                <select class="searchbar searchtype" name="type">
                    <option value="magazine_title">Name of Magazine</option>
                    <option value="magazine_date">Date of Publication</option>
                    <option value="magazine_date">Month of Publication</option>
                    <option value="magazine_date">Year of Publication</option>
                    <option value="magazine_title">Subject</option>
                    <option value="magazine_title">Title</option>
                    <option value="magazine_editor">Author Name</option>
                </select>
                
                <input class="searchbar searchtext" type="text" name="search" placeholder="Type to search..." class="searchbar">
                
                <div class="searcMagazineModalBtn">
                    <button type="submit" class="close_modal">
                        <img src="{{ asset('images/close_icon.png') }}">
                    </button>
                    <button type="submit"><img src="{{ asset('images/search_icon.png') }}"></button>
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

@push('scripts')
    <script type="text/javascript">
        $('.close_modal').on('click', function(){
            $('.searchbar.searchtext').val("");
            $('#searcMagazineModal').modal('hide');
        })
    </script>
@endpush