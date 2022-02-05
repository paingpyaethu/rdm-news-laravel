<div class="table-responsive">
   <table class="table table-hover mb-0">
      <thead>
      <tr>
         <th>#</th>
         <th>Title</th>
         <th>Owner</th>
         <th>Action</th>
         <th>Created_at</th>
      </tr>
      </thead>
      <tbody>
{{--      @foreach(\App\Category::with('User')->get() as $category)--}}
      @forelse($categories as $category)
      <tr>
         <td>{{ $category->id }}</td>
         <td>{{ $category->title }}</td>
         <td>{{ $category->User->name }}</td>
         <td class="text-nowrap">
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-info">
               Edit
            </a>
            <form action="{{ route('category.destroy', $category->id) }}" class="d-inline-block" method="post">
               @csrf
               @method('delete')
               <button class="btn btn-outline-danger"
               onclick="return confirm('Are u sure to delete {{$category->title}} category!!')">Delete</button>
            </form>
         </td>
         <td class="text-nowrap">
            <span class="small">
               <i class="fas fa-calendar-check"></i>
               {{ $category->created_at->format('d-m-Y') }}
            </span>
            <span class="small">
               <i class="fas fa-clock"></i>
               {{ $category->created_at->format('h:i A') }}
            </span>
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="5" class="text-center text-danger font-weight-bold border-bottom">No Category Found!</td>
      </tr>
      @endforelse
      </tbody>
   </table>
</div>
