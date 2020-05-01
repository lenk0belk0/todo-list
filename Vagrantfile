Vagrant.configure("2") do |config|
    config.vm.box = "ubuntu/bionic64"

    config.vm.provider "virtualbox" do |v|
        v.name = "todo-list"
        v.memory = 2048

        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        v.customize ["setextradata", :id, "--VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
    end

    config.vm.hostname = "todo-list.local"
    config.hostsupdater.aliases = ["api.todo-list.local"]
    config.vm.network "private_network", ip: "192.168.11.11"

    config.vm.synced_folder "salt/roots/", "/srv/salt/"
    config.vm.synced_folder "salt/pillar", "/srv/pillar/"
    config.vm.synced_folder "api", "/home/vagrant/api", id: "root", :nfs => true

    config.vm.provision :salt do |salt|
        salt.minion_config = "salt/minion.yml"
        salt.run_highstate = true
        salt.colorize = true
        salt.log_level = 'info'
     end
end
