/ip/hotspot/profile
set [find] dns-name=login.internet.com hotspot-address=10.5.50.1 html-directory= login@lader login-by=cookie,http-chap,https,http-pap,trial,mac-cookie  split-user-domain=yes
/ip hotspot walled-garden ip
add action=accept disabled=no dst-address=192.168.201.13 !dst-address-list !dst-port !protocol !src-address !src-address-list
