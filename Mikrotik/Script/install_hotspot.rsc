/ip/hotspot/profile
set [find] dns-name=login-ae.internet.com hotspot-address=192.168.45.1 html-directory= login@lader login-by=cookie,http-chap,https,http-pap,trial,mac-cookie  split-user-domain=yes
/ip hotspot walled-garden ip
add action=accept disabled=no dst-address=192.168.45.251 !dst-address-list !dst-port !protocol !src-address !src-address-list
