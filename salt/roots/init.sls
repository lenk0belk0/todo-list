/home/vagrant/app:
  composer.installed:
    - require:
      - cmd: install-composer

  npm.bootstrap:
    - require:
      - pkg: npm