# WARNING: This repository is no longer maintained :warning:

> This repository will not be updated. The repository will be kept available in read-only mode.

# ProcessWire FE User Handling

Please have a look at the following module before considering using this one:

[About Login/Register/Profile](https://modules.processwire.com/modules/login-register):
Front-end login or register for an account in ProcessWire. Also provides profile editing capabilities.
Author: Ryan Cramer 

## Configuration

- Page to rediret to after login
- Page to rediret to after logout
- Page to rediret to after clicking change email link (must be public)
- User Role
- Profile Fields
- E-Mail From Address
- Register E-Mail Message
- Change E-Mail Message
- Period of Validity (Number of days confirmation links are valid)

## How it works

### Login

```
$modules->get('FeUser')->login();
```

### Logout

```
$modules->get('FeUser')->logout();
```

### Registration

```
$response = $modules->get('FeUser')->register();
```

### Change Profile

```
$modules->get('FeUser')->getProfileForm();
$modules->get('FeUser')->getProfileFormChangeMail();
```

### Forgot Password

- using username or usermail
- option: force user to renew pass (set `$user->force_pass_renew = 1` in user profile)

```
$modules->get('FeUser')->forgotPassword();
```

**Work in Progress!**
