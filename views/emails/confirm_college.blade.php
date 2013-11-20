Dear User,

Please confirm your account on this link.
{{ URL::to("confirm/".base64_encode($user->email)) }}


Part 2 code: {{ substr(md5($user->name.$user->email), -4) }}


For part 1 code, please visit your email {{ $user->email }}