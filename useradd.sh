#!/bin/bash

users=("manage" "kikuchi" "seo")
passwords=("manage" "k1kuCh@n" "SE0_E!6!6Ect")

for i in ${!users[@]}
do
  useradd -m ${users[i]}
  echo ${users[i]}:${passwords[i]} | chpasswd
  echo ${users[i]}" ALL=(ALL) ALL" >> /etc/sudoers
  chmod 711 /home/${users[i]}/
done
