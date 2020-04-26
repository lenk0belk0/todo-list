add-nodejs-gpg-key:
  cmd.run:
    - name: 'curl https://deb.nodesource.com/gpgkey/nodesource.gpg.key | apt-key add -'
    - onlyif: 'test -z "`apt-key list | grep 1655A0AB68576280`"'

nodejs-repo:
  pkgrepo.managed:
    - name: deb https://deb.nodesource.com/node_12.x bionic main
    - refresh: true
    - watch:
      - cmd: add-nodejs-gpg-key

nodejs:
  pkg.installed:
    - require:
      - nodejs-repo

yarn:
  cmd.run:
    - name: 'npm install --global yarn'
    - require:
      - nodejs
