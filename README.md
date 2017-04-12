# ros_bgpzbx
SCRIPT PARA LLD ZABBIX
- Descobre dos peerings ativo no roteador
- Itens: Uptime e state.

Examplo:
ros_discover_bgp.php 200.200.202.2 userbgp passbgp (Descobre peerings ativos no host);

ros_check_peerbgp.php 200.200.202.2 userbgp passbgp state
(Retorna 1 para established e 0 para não established)
ros_check_peerbgp.php 200.200.202.2 userbgp passbgp uptime (Retorna Uptime do peer);

Faça clone do projeto e depois copie os escripts ros_check_peerbgp.php, ros_discover_bgp.php e routeros_api.class.php
para /usr/lib/zabbix/externalscripts/

Importe o template no zabbix.

Versão do zabbix 3.2.4

Obs: É prudente criar um usuário com permissão apenas de leitura para acessar as informações  de bgp
e também setar allow address para o ip do zabbix server para que não ocorram problemas.
