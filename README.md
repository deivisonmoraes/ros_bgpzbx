# ros_bgpzbx
SCRIPT PARA LLD ZABBIX
- Descobre dos peerings ativo no roteador
- Itens: Uptime e state.

Examplo:
ros_discover_bgp.php 200.200.202.2 userbgp passbgp (Descobre peerings ativos no host);

ros_check_peerbgp.php 200.200.202.2 userbgp passbgp state
(Retorna state do peer, established, open sent, connect, etc;)
ros_check_peerbgp.php 200.200.202.2 userbgp passbgp uptime (Retorna Uptime do peer);

- Copiar para /usr/lib/zabbix/externalscripts
