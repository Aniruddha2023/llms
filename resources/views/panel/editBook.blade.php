@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>Edit Books</h3>
            </div>
            <div class="module-body">
                <form id="editBookForm" class="form-horizontal row-fluid" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" value="{{ $book->book_id }}" name="book_id" id="bookId" data-form-field="author"
                        class="span8">
                    <br>
                    <span class="text-danger error-text author_error" style="color: red"></span>

                    <div class="control-group">
                        <label class="control-label">Title Of Book</label>
                        <div class="controls">
                            <input type="text" value="{{ $book->title }}" name="title" id="title"
                                data-form-field="title" placeholder="Enter the title of the book here..." class="span8">
                            <br>
                            <span class="text-danger error-text title_error" style="color: red"></span>
                            <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                            <input type="hidden" data-form-field="auth_user" value="{{ auth()->user()->id }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Author Name</label>
                        <div class="controls">
                            <input type="text" value="{{ $book->author }}" name="author" id="author"
                                data-form-field="author" placeholder="Enter the name of author for the book here..."
                                class="span8">
                            <br>
                            <span class="text-danger error-text author_error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Description of Book</label>
                        <div class="controls">
                            <textarea class="span8" name="description" id="description" data-form-field="description" rows="5"
                                placeholder="Enter few lines about the book here">{{ $book->description }}</textarea>
                            <br>
                            <span class="text-danger error-text description_error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Category</label>
                        <div class="controls">
                            <select tabindex="1" name="category_id" id="category" data-form-field="category"
                                data-placeholder="Select category.." class="span8">
                                @foreach ($categories_list as $category)
                                    <option {{ $book->category_id == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            <br>
                            <span class="text-danger error-text category_id_error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Isbn</label>
                        <div class="controls">
                            <input type="text" value="{{ $book->isbn }}" name="isbn" id="isbn"
                                data-form-field="isbn" placeholder="Enter ISBN No..." class="span8">
                            <br>
                            <span class="text-danger error-text isbn_error" style="color: red"></span>
                        </div>
                    </div>

                    {{-- <div class="control-group">
                        <label class="control-label">Number of issues</label>
                        <div class="controls">
                            <input type="number" name="number" id="number" data-form-field="number"
                                placeholder="How many issues are there?" class="span8">

                        </div>
                    </div> --}}
                    <div class="control-group">
                        <label class="control-label">Select Image</label>
                        <div class="controls">
                            <input type="file" name="book_image" id="image" data-form-field="image" class="span8">
                            <span class="text-danger error-text book_image_error"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-inverse" id="editbooks">Update Books</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('custom_bottom_script')

    <script type="text/javascript" src="{{ asset('static/custom/js/script.addbook.js') }}"></script>

@stop
