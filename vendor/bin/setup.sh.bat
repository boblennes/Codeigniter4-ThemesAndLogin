@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../psecio/gatekeeper/bin/setup.sh
bash "%BIN_TARGET%" %*
