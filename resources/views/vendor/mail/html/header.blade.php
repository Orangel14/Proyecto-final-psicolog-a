@props(['url'])
<tr>
  <td class="header">
    <a href="{{ $url }}" style="display: inline-block;">
      @if (trim($slot) === 'Laravel')
        <img src="https://laravel.com/img/notification-logo_review.png" class="logo" alt="Laravel Logo">
      @else
        {{ $slot }}
      @endif
    </a>
  </td>
</tr>
