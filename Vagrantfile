# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "debian/bullseye64"
  config.vm.hostname = "phpserver"
  config.vm.define "phpserver"
  config.vm.network "private_network", ip: "172.16.0.200"
  config.vm.provision "shell", path: "bootstrap.sh"
  config.vm.synced_folder "www/html/", "/var/www/html"
  config.vm.provider "virtualbox" do |vb|
	vb.name = "phpserver"
    vb.memory = "512"
    vb.cpus = 1
  end
end

