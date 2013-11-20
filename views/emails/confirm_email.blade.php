Dear friend,

Please confirm your account on this link.
{{ URL::to("confirm/".base64_encode($user->email)) }}

Part 1 code: {{ substr(md5($user->name.$user->jee_air), -4) }}


For part 2 code, please visit your college email {{ $user->college_email }}