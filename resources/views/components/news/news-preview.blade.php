@props(['news'])

<div class="bg-white shadow-sm rounded-lg p-6 mt-6">
    <p class="px-2 py-1 text-xs rounded-md bg-gray-200 text-gray-700 uppercase font-semibold">{{ $news->category->name }}</p>
    <p class="mt-4"><a href="{{ route('news.show', ['news' => $news]) }}"> {{ $news->title }}</a></p>
    <p class="mt-4 text-xs text-gray-500">{{ $news->created_at->format('d.m.Y') }}</p>
    <div>
        <a href="{{ 'news.edit' }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp;
        <a href="javascript:;" style="font-size: 12px; color:red;">Delete</a>
    </div>
</div>
