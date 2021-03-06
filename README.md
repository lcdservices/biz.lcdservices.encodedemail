# biz.lcdservices.encodedemail

This extension creates a new token entitled "Encoded Email" which encodes and returns the contact's primary email. It first applies a base 64 encode, and then a URI encode.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM (*FIXME: Version number*)

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl biz.lcdservices.encodedemail@https://github.com/FIXME/biz.lcdservices.encodedemail/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/lcdservices/biz.lcdservices.encodedemail.git
cv en encodedemail
```
