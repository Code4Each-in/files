@push('styles')
<style>
    /* #circle-loader-wrap{x
        display: none;
    } */
    .loading-msg {
        font-weight: bold;
    }

    .copy-btn {
        background-color: #2a5555;
        color: white;
    }

    .copy-btn:hover {
        color: white;
    }

    .btn.disabled,
    .btn:disabled {
        opacity: .65;
        background: #2a5555;
        color: #fff !important;
    }

    .form-check-input:checked {
        background-color: #2a5555;
        border-color: #2a5555
    }
</style>
@endpush


<div class="col-lg-4 col-md-12">
    <div class="form-design">
        <div class="card px-3 py-4 shadow-lg">
            <div class="card-body">
            @if ($fileLink)
                <div class="gif-container">
                    <dotlottie-player src="https://lottie.host/a91c7bb1-7a5a-40f5-8720-5d61a93a8282/QQ0RJLBzGQ.json" background="transparent" speed="1" style="width: 300px; height: 200px;" loop autoplay></dotlottie-player>
                    <p class="success-message">You’re done!</p>
                    <p class="complete__text">Copy your download link or <a href="" id="insideLink">see what's inside</a></p>
                    <!-- <p class="success-message">Loading, please wait...</p> -->
                    <div class="text-center">
                        <input type="text" class="form-control file_link mb-2 fileLinkAddress" id="fileLink" name="fileLink" value="{{ $fileLink }}" readonly>
                        <button type="button" id="copy-link" class="btn copy-btn">Copy Link</button>
                        <!-- <button type="button" id="copied" class="btn btn-primary" style="display: none;" disabled>Copied !</button> -->
                    </div>
                </div>
  
            @else
                <div class="upload-form">
                    <form action="{{ route('generate_link') }}" method="post" enctype="multipart/form-data" id="getLink">
                        @csrf
                        <div class="uploader__empty-state uploader__empty-state--with-display-name uploader__empty-state--with-directories-selector"><span aria-label="Add files" class="styles_module_wtIcon__d2f058f9 styles_module_wtIcon_Inherit__d2f058f9 openFileDialog"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" class="styles_module_wtIconSvg__d2f058f9" role="img" viewBox="0 0 32 32">
                                    <g clip-path="url(#wt_add_circle_fill_svg__a)">
                                        <path fill="currentColor" fill-rule="evenodd" d="M16 0C7.163 0 0 7.163 0 16s7.163 16 16 16 16-7.163 16-16S24.837 0 16 0m.75 10.667a.75.75 0 0 0-1.5 0v4.583h-4.583a.75.75 0 0 0 0 1.5h4.583v4.583a.75.75 0 0 0 1.5 0V16.75h4.583a.75.75 0 0 0 0-1.5H16.75z" clip-rule="evenodd"></path>

                                    </g>
                                    <defs>
                                        <clipPath id="wt_add_circle_fill_svg__a">
                                            <path fill="#fff" d="M0 0h32v32H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg></span>
                            <div class="uploader__empty-state-text">
                                <h2>Add files</h2>
                                <!-- <button type="button" class="uploader__sub-title uploader__directories-dialog-trigger" data-testid="no-uploads-directories-selector">Or select a folder</button> -->
                                <input type="file" class="form-control d-none fileInput" name="fileToTransfer">
                            </div>
                        </div>
                        <span id="fileError" class="text-danger"></span>
                        <div class="form-div">
                            <div class="row">
                                <h6 class="information  text-center text-muted">Please provide following information</h6>
                                <div class="col-12 mb-3">
                                    <input type="text" name="title" class="form-control title" placeholder="Title">
                                    <span id="titleError" class="text-danger"></span>
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="message" class="form-control" id="message" placeholder="Message" rows="3"></textarea>
                                </div>
                                <div class="form-check col-12 ms-3">
                                    <input class="form-check-input" type="radio" name="file_type" id="fileType" value="public">
                                    <label class="form-check-label" for="fileType">
                                        Public
                                    </label>
                                </div>
                                <div class="form-check col-12 ms-3">
                                    <input class="form-check-input" type="radio" name="file_type" id="file_type" value="private">
                                    <label class="form-check-label" for="file_type">
                                        Private
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="transfer__footer">
                            <!-- <div class="TransferOptionsIconBar_iconbar__yu_2U"><span aria-haspopup="true" aria-expanded="false" data-popover="custom popover" id="wt-popover-target-GHOFVDYq_6mbg2WB_ans_" aria-describedby="wt-popover-content-R-Jhdn8etJYfODvMF6q6d">
                                    <div><button class="TransferOptionsIconBar_iconButton__Ioj99" aria-label="Set expiry option" data-testid="iconbar-option-expiry" tabindex="0" data-target="Expiry" data-tracking-feature="Expiry" data-tracking-feature-state="Enabled" data-tracking-feature-value="3d"><span aria-hidden="true" data-testid="iconbar-icon" class="styles_module_wtIcon__d2f058f9 styles_module_wtIcon_Inherit__d2f058f9 TransferOptionsIconBar_icon___mlPL"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" class="styles_module_wtIconSvg__d2f058f9" role="img" viewBox="0 0 32 32">
                                                    <g stroke="currentColor" stroke-width="1.5" clip-path="url(#wt_calendar_svg__a)">
                                                        <rect width="26.667" height="24" x="2.667" y="5.333" rx="5.333"></rect>
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 2.667V8m12-5.333V8"></path>
                                                        <path d="M2.667 13.333h26.666"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="wt_calendar_svg__a">
                                                            <path fill="#fff" d="M0 0h32v32H0z"></path>
                                                        </clipPath>
                                                    </defs>
                                                </svg></span></button></div>
                                </span>
                                <div><span aria-haspopup="true" aria-expanded="false" class="TransferWindowUpsell_upsell-container__aQL_E" data-popover="custom popover" id="wt-popover-target-bc8LAJFJH9HGCykJKm38O" tabindex="-1" aria-describedby="wt-popover-content-x7pQnvIPNg5Hjskiu1Ftw"><span tabindex="0" class="PopoverUpsell_trigger__oWzP3" aria-label="Upgrade to set a price for your files and receive payment before they are downloaded."><span class="TransferOptionsIconBar_iconButton__Ioj99 TransferOptionsIconBar_disabled__EjhRM" data-tracking-feature="Price" data-tracking-feature-state="Locked" data-testid="iconbar-option-paid"><span aria-hidden="true" data-testid="iconbar-icon" class="styles_module_wtIcon__d2f058f9 styles_module_wtIcon_Inherit__d2f058f9 TransferOptionsIconBar_icon___mlPL"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" class="styles_module_wtIconSvg__d2f058f9" role="img" viewBox="0 0 32 32">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.33 8.448v15.105m3.432-12.359h-5.149a2.403 2.403 0 0 0 0 4.806h3.433a2.403 2.403 0 1 1 0 4.806H12.21M16 30.5C7.992 30.5 1.5 24.008 1.5 16S7.992 1.5 16 1.5 30.5 7.992 30.5 16 24.008 30.5 16 30.5"></path>
                                                    </svg></span></span></span></span></div>
                                <div><span aria-haspopup="true" aria-expanded="false" class="TransferWindowUpsell_upsell-container__aQL_E" data-popover="custom popover" id="wt-popover-target-l0Sk3bAEu43ViTqr3J13O" tabindex="-1" aria-describedby="wt-popover-content-WOWHaDH6K42ScDA420iG8"><span tabindex="0" class="PopoverUpsell_trigger__oWzP3" aria-label="Make your transfers stand out by designing backgrounds that deliver your files in style."><span class="TransferOptionsIconBar_iconButton__Ioj99 TransferOptionsIconBar_disabled__EjhRM" data-tracking-feature="Wallpaper" data-tracking-feature-state="Locked" data-testid="iconbar-option-customize"><span aria-hidden="true" data-testid="iconbar-icon" class="styles_module_wtIcon__d2f058f9 styles_module_wtIcon_Inherit__d2f058f9 TransferOptionsIconBar_icon___mlPL"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" class="styles_module_wtIconSvg__d2f058f9" role="img" viewBox="0 0 32 32">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.667 22.667v1.666a5 5 0 0 0 5 5h16.666a5 5 0 0 0 5-5v-1.666m-26.666 0v-15a5 5 0 0 1 5-5h11.666m-16.666 20 4.2-4.2a1.5 1.5 0 0 1 2.189.073l2.555 2.92a1.5 1.5 0 0 0 2.19.073l5.847-5.847a1.5 1.5 0 0 1 2.078-.042l7.607 7.023m0 0v-10"></path>
                                                        <circle cx="10.667" cy="10.667" r="2.667" fill="currentColor"></circle>
                                                        <path fill="currentColor" fill-rule="evenodd" d="M26 1c.476 0 .862.386.862.862a3.276 3.276 0 0 0 3.276 3.276.862.862 0 1 1 0 1.724 3.276 3.276 0 0 0-3.276 3.276.862.862 0 0 1-1.724 0 3.276 3.276 0 0 0-3.276-3.276.862.862 0 1 1 0-1.724 3.276 3.276 0 0 0 3.276-3.276c0-.476.386-.862.862-.862" clip-rule="evenodd"></path>
                                                    </svg></span></span></span></span></div>
                                <div><span aria-haspopup="true" aria-expanded="false" class="TransferWindowUpsell_upsell-container__aQL_E" data-popover="custom popover" id="wt-popover-target-4xdQysHZVxUcixbE2dk1Z" tabindex="-1" aria-describedby="wt-popover-content-b5V3ExflpErH1WCMcq5Yq"><span tabindex="0" class="PopoverUpsell_trigger__oWzP3" aria-label="Upgrade to secure your transfer with a password."><span class="TransferOptionsIconBar_iconButton__Ioj99 TransferOptionsIconBar_disabled__EjhRM" data-tracking-feature="Password" data-tracking-feature-state="Locked" data-testid="iconbar-option-protected"><span aria-hidden="true" data-testid="iconbar-icon" class="styles_module_wtIcon__d2f058f9 styles_module_wtIcon_Inherit__d2f058f9 TransferOptionsIconBar_icon___mlPL"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" class="styles_module_wtIconSvg__d2f058f9" role="img" viewBox="0 0 32 32">
                                                        <path fill="currentColor" fill-rule="evenodd" d="M8.003 16.003v10.664a2.663 2.663 0 0 0 2.664 2.663h10.666a2.663 2.663 0 0 0 2.664-2.663V16.003zM8 13.333A2.667 2.667 0 0 0 5.333 16v10.667A5.333 5.333 0 0 0 10.667 32h10.666a5.333 5.333 0 0 0 5.334-5.333V16A2.667 2.667 0 0 0 24 13.333z" clip-rule="evenodd"></path>
                                                        <path fill="currentColor" fill-rule="evenodd" d="M16 4a4 4 0 0 0-4 4v6.667a1.333 1.333 0 1 1-2.667 0V8a6.667 6.667 0 1 1 13.334 0v6.667a1.333 1.333 0 0 1-2.667 0V8a4 4 0 0 0-4-4" clip-rule="evenodd"></path>
                                                    </svg></span></span></span></span></div><span aria-haspopup="true" aria-expanded="false" data-popover="custom popover" id="wt-popover-target-h3OX1LzlS39Z4SnJewjzr" aria-describedby="wt-popover-content-ptXiDpqmsrW6P9-0xDfYU">
                                    <div><button class="TransferOptionsButtonIconBar TransferOptionsIconBar_iconButton__Ioj99" aria-label="More options" data-testid="iconbar-option-more-settings" data-tracking-feature="All" data-tracking-feature-state="Enabled" tabindex="0"><span aria-hidden="true" data-testid="iconbar-icon" class="styles_module_wtIcon__d2f058f9 styles_module_wtIcon_Inherit__d2f058f9 TransferOptionsIconBar_icon___mlPL"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" class="styles_module_wtIconSvg__d2f058f9" role="img" viewBox="0 0 32 32">
                                                    <g fill="currentColor">
                                                        <circle cx="16.001" cy="25.334" r="2.667" transform="rotate(-90 16.001 25.334)"></circle>
                                                        <circle cx="16.001" cy="16" r="2.667" transform="rotate(-90 16.001 16)"></circle>
                                                        <circle cx="16.001" cy="6.666" r="2.667" transform="rotate(-90 16.001 6.666)"></circle>
                                                    </g>
                                                </svg></span></button></div>
                                </span>
                            </div> -->
                            <div class="transfer__footer--iconbar"><button class="styles_module_wtButton__38691ab2 styles_module_wtButton_Medium__38691ab2 styles_module_wtButtonPrimaryDefault_Light__38691ab2 transfer__button transfer__button--inactive" type="submit" data-testid="uploaderForm-transfer-button">Transfer</button></div>
                        </div>
                    </form>
                </div>
            @endif
               
                <div class="card-loader" style="display: none;">
                    <div id="circle-loader-wrap">
                        <div class="left-wrap">
                            <div class="loader"></div>
                        </div>
                        <div class="right-wrap">
                            <div class="loader"></div>
                        </div>
                        <div class="counter" id="counter">0%</div>
                    </div>
                    <div class="cancel text-center"><span class="loading-msg">Transferring...</span><br><br><button type="button" class="styles_module_wtButton__38691ab2 styles_module_wtButton_Medium__38691ab2 styles_module_wtButtonPrimaryDefault_Light__38691ab2 transfer__button transfer__button--inactive">Cancel</button></div>
                </div>
                <div class="gif-container gif-show-cont" style="display:none">
                    <dotlottie-player src="https://lottie.host/a91c7bb1-7a5a-40f5-8720-5d61a93a8282/QQ0RJLBzGQ.json" background="transparent" speed="1" style="width: 300px; height: 200px;" loop autoplay></dotlottie-player>
                    <p class="success-message">You’re done!</p>
                    <p class="complete__text">Copy your download link or <a href="" id="insideLink">see what's inside</a></p>
                    <!-- <p class="success-message">Loading, please wait...</p> -->
                    <div class="text-center">
                        <input type="text" class="form-control file_link mb-2 fileLinkAddress" id="fileLink" name="fileLink" value="{{ $fileLink }}" readonly>
                        <button type="button" id="copy-link" class="btn copy-btn">Copy Link</button>
                        <!-- <button type="button" id="copied" class="btn btn-primary" style="display: none;" disabled>Copied !</button> -->
                    </div>
                </div>
                <!-- <p class="complete__text">We’re making magic happen!</p> -->
            </div>
        </div>
    </div>
    <!-- Right: Form Section -->
</div>
@section('js_scripts')
<script>
    // $=jQuery;
    $(document).ready(function() {
        $('#copy-link').attr('disabled', false);
        $('#copy-link').text('Copy Link');
        // $("#copy-link").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.openFileDialog').on('click', function() {
            $('.fileInput').click();
        })

        $('.fileInput').change(function() {
            var fileName = $(this)[0].files[0].name;
            $('.title').val(fileName);
            //console.log(fileInput);
        })

        // $('#getLink').on('submit', function(e) {
        //     e.preventDefault(); // Prevent the form from refreshing the page
        //     // Create a FormData object to hold the form data, including files
        //     $('#insideLink').attr('href', '');
        //     $('.upload-form').hide();
        //     $('.card-loader').show();
        //     var formData = new FormData(this);
        //     $('#titleError').text('');
        //     $('#fileError').text('');
        //     $.ajax({
        //         url: "{{ route('generate_link') }}",
        //         method: 'POST',
        //         data: formData,
        //         processData: false, // Don't process the data
        //         contentType: false, // Set contentType to false as FormData automatically sets the correct content type
        //         success: function(response) {
        //             // var result =JSON.parse(response);                    
        //             if (response.status) {
        //                 $('.upload-form').hide();
        //                 $('.card-loader').hide();
        //                 $('.file_link').val(response.fileLink);
        //                 $('#insideLink').attr('href', response.fileLink);
        //                 $('.gif-show-cont').show();
        //             }
        //             console.log(response);
        //         },
        //         error: function(response) {
        //             $('.card-loader').hide();
        //             $('.upload-form').show();
        //             if (response.status === 422) { // Validation error
        //                 var errors = response.responseJSON.errors;
        //                 if (errors.title) {
        //                     $('#titleError').text(errors.title[0]); // Show title validation error
        //                 }
        //                 if (errors.fileToTransfer) {
        //                     $('#fileError').text(errors.fileToTransfer[0]); // Show file validation error
        //                 }
        //             } else {
        //                 alert('An error occurred.');
        //             }
        //         }

        //     })

        // })

        $('#getLink').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from refreshing the page

            const fileInput = $('.fileInput')[0]; // Ensure the file input has this ID
            const file = fileInput.files[0]; // Get the file
            if (!file) {
                $('#fileError').text('Please select a file.');
                return;
            }

            const chunkSize = 1024 * 1024; // 1 MB
            const totalChunks = Math.ceil(file.size / chunkSize);
            const uniqueId = Date.now(); // Unique ID for this upload
            let currentChunk = 0;

            $('#insideLink').attr('href', '');
            $('.upload-form').hide();
            $('.card-loader').show();

            function uploadChunk() {
                const start = currentChunk * chunkSize;
                const end = Math.min(start + chunkSize, file.size);
                const chunk = file.slice(start, end);
                const formData = new FormData();
                formData.append('fileToTransfer', chunk);
                formData.append('chunk', currentChunk);
                formData.append('totalChunks', totalChunks);
                formData.append('unique_id', uniqueId); // Unique identifier for the session
                formData.append('original_filename', file.name); // Add original filename

                $.ajax({
                    url: "{{ route('upload.chunk') }}", // Update this route to handle chunk uploads
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response)
                        if (response.status) {
                            currentChunk++;
                            if (currentChunk < totalChunks) {
                                uploadChunk(); // Upload the next chunk
                            } else {
                                generateLink(); // All chunks uploaded, generate the link
                            }
                        } else {
                            alert('Error uploading chunk.');
                            $('.upload-form').show();
                            $('.card-loader').hide();
                        }
                    },
                    error: function(response) {
                        $('.card-loader').hide();
                        $('.upload-form').show();
                        if (response.status === 422) { // Validation error
                            var errors = response.responseJSON.errors;
                            if (errors.fileToTransfer) {
                                $('#fileError').text(errors.fileToTransfer[0]); // Show file validation error
                            }
                        } else {
                            alert('An error occurred while uploading.');
                        }
                    }
                });
            }

            function generateLink() {
                $.ajax({
                    url: "{{ route('generate_link') }}",
                    method: 'POST',
                    data: {
                        'file_unique_id': uniqueId, // Send the unique ID to generate the link
                        'original_filename': file.name,
                        'file_type': $('#fileType').val(),
                    },
                    success: function(response) {
                        if (response.status) {
                            $('.upload-form').hide();
                            $('.card-loader').hide();
                            $('.file_link').val(response.fileLink);
                            $('#insideLink').attr('href', response.fileLink);
                            $('.gif-show-cont').show();
                        }
                    },
                    error: function(response) {
                        $('.card-loader').hide();
                        $('.upload-form').show();
                        alert('An error occurred while generating the link.');
                    }
                });
            }

            uploadChunk(); // Start uploading chunks
        });


        $("#copy-link").on('click', function() {
            // Select the input field with the URL

            var link = $(".fileLinkAddress");
            // Select the text in the input field
            link.select();

            link[0].setSelectionRange(0, 99999); // For mobile devices
            // Copy the text inside the input field
            document.execCommand('copy');
            $('#copy-link').text('Copied !');
            $('#copy-link').attr('disabled', true);
            // $('#copy-link').hide();
            // $('#copied').show();
        })
    })
</script>
@endsection