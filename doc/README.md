# Documentation

## Table of Contents

| Method | Description |
|--------|-------------|
| [**Actito**](#Actito) | Wrapper for Actito API |
| [Actito::profile](#Actitoprofile) | Profile |
| [Actito::customTable](#ActitocustomTable) | Custom table |
| [Actito::namedValues](#ActitonamedValues) | Convert simple array to paired name/value array |
| [**Actito**](#Actito) | Actito Facade |
| [**ActitoServiceProvider**](#ActitoServiceProvider) | Actito Service Provider for Laravel |
| [ActitoServiceProvider::register](#ActitoServiceProviderregister) |  |
| [ActitoServiceProvider::boot](#ActitoServiceProviderboot) |  |
| [**Client**](#Client) | Wrapper for the Laravel Http client that adds the Actito token to the request |
| [Client::__construct](#Client__construct) | Actito Http Client |
| [Client::get](#Clientget) | Http get |
| [Client::post](#Clientpost) | Http post |
| [Client::put](#Clientput) | Http put |
| [Client::delete](#Clientdelete) | Http delete |
| [**CustomTable**](#CustomTable) | Interface for Actito DataModel API Custom Table |
| [CustomTable::__construct](#CustomTable__construct) |  |
| [CustomTable::get](#CustomTableget) | Show a record |
| [CustomTable::save](#CustomTablesave) | Update or create a record |
| [CustomTable::delete](#CustomTabledelete) | Delete a record |
| [CustomTable::tables](#CustomTabletables) | List custom tables |
| [CustomTable::schema](#CustomTableschema) | Get a custom table schema |
| [**InstallActito**](#InstallActito) |  |
| [InstallActito::handle](#InstallActitohandle) |  |
| [**Profile**](#Profile) | Interface for Actito Data API Profile |
| [Profile::__construct](#Profile__construct) |  |
| [Profile::get](#Profileget) | Show a profile |
| [Profile::search](#Profilesearch) | Search a profile |
| [Profile::save](#Profilesave) | Update or create a profile |
| [Profile::delete](#Profiledelete) | Delete a profile |
| [Profile::subscriptions](#Profilesubscriptions) | Get list of subscription for a profile |
| [Profile::subscribe](#Profilesubscribe) | Add a subscription to a profile |
| [Profile::unsubscribe](#Profileunsubscribe) | Remove a subscription from a profile |
| [Profile::segmentations](#Profilesegmentations) | Get list of segmentations for a profile |
| [Profile::segment](#Profilesegment) | Add a segmentation to a profile |
| [Profile::unsegment](#Profileunsegment) | Remove a segmentation from a profile(I know. &quot;to unsegment&quot; in not a real verb) |
| [Profile::tables](#Profiletables) | List of profile tables |
| [Profile::schema](#Profileschema) | Get a profile table schema |

## Actito

Wrapper for Actito API



* Full name: \Produpress\Actito\Actito


### Actito::profile

Profile

```php
Actito::profile( string|null tableId = null ): \Produpress\Actito\Profile
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableId` | **string\|null** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#tag/Profiles - 

---
### Actito::customTable

Custom table

```php
Actito::customTable( string customTableId = null ): \Produpress\Actito\CustomTable
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `customTableId` | **string** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#tag/Custom-Table-Records - 

---
### Actito::namedValues

Convert simple array to paired name/value array

```php
Actito::namedValues( array inputData, string valueName = 'value' ): array
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `inputData` | **array** |  |
| `valueName` | **string** |  |


**Return Value:**





---
## Actito

Actito Facade



* Full name: \Produpress\Actito\Facades\Actito
* Parent class: 


## ActitoServiceProvider

Actito Service Provider for Laravel



* Full name: \Produpress\Actito\ActitoServiceProvider
* Parent class: 


### ActitoServiceProvider::register



```php
ActitoServiceProvider::register(  ): mixed
```





**Return Value:**





---
### ActitoServiceProvider::boot



```php
ActitoServiceProvider::boot(  ): mixed
```





**Return Value:**





---
## Client

Wrapper for the Laravel Http client that adds the Actito token to the request



* Full name: \Produpress\Actito\Client


### Client::__construct

Actito Http Client

```php
Client::__construct(  ): void
```





**Return Value:**





---
### Client::get

Http get

```php
Client::get( string url ): mixed
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** |  |


**Return Value:**





---
### Client::post

Http post

```php
Client::post( string url, array data = null ): mixed
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** |  |
| `data` | **array** |  |


**Return Value:**





---
### Client::put

Http put

```php
Client::put( string url, array data = null ): mixed
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** |  |
| `data` | **array** |  |


**Return Value:**





---
### Client::delete

Http delete

```php
Client::delete( string url ): mixed
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** |  |


**Return Value:**





---
## CustomTable

Interface for Actito DataModel API Custom Table



* Full name: \Produpress\Actito\CustomTable

**See Also:**

* https://developers.actito.com/api-reference/data-v4/#tag/Custom-Table-Records - 

### CustomTable::__construct



```php
CustomTable::__construct( string customTableId = null ): void
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `customTableId` | **string** |  |


**Return Value:**





---
### CustomTable::get

Show a record

```php
CustomTable::get( string recordId ): array|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `recordId` | **string** |  |


**Return Value:**

profile data or null if not found


**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-get-one - 

---
### CustomTable::save

Update or create a record

```php
CustomTable::save( array record ): int|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `record` | **array** | record data |


**Return Value:**

record id or null


**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-createorupdate - 

---
### CustomTable::delete

Delete a record

```php
CustomTable::delete( string recordId ): bool
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `recordId` | **string** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-delete-one - 

---
### CustomTable::tables

List custom tables

```php
CustomTable::tables(  ): array|null
```





**Return Value:**

list of custom tables


**See Also:**

* https://developers.actito.com/api-reference/datamodel-v5/#operation/customtables-get-list - 

---
### CustomTable::schema

Get a custom table schema

```php
CustomTable::schema(  ): array|null
```





**Return Value:**

custom table schema


**See Also:**

* https://developers.actito.com/api-reference/datamodel-v5/#operation/customtables-get-one - 

---
## InstallActito





* Full name: \Produpress\Actito\Console\InstallActito
* Parent class: 


### InstallActito::handle



```php
InstallActito::handle(  ): mixed
```





**Return Value:**





---
## Profile

Interface for Actito Data API Profile



* Full name: \Produpress\Actito\Profile

**See Also:**

* https://developers.actito.com/api-reference/data-v4/#tag/Profiles - 

### Profile::__construct



```php
Profile::__construct( string tableId = null ): mixed
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableId` | **string** |  |


**Return Value:**





---
### Profile::get

Show a profile

```php
Profile::get( int profileId ): array|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |


**Return Value:**

profile data or null if not found


**See Also:**

* https://developers.actito.com/api-reference/data-v4#operation/profiles-get-one - 

---
### Profile::search

Search a profile

```php
Profile::search( array keyValue ): array|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `keyValue` | **array** | key=&gt;value |


**Return Value:**

profile data or null if not found


**See Also:**

* https://developers.actito.com/api-reference/data-v4#operation/profiles-get-one - 

---
### Profile::save

Update or create a profile

```php
Profile::save( array profile ): int|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profile` | **array** | profile data |


**Return Value:**

profile id or null


**See Also:**

* https://developers.actito.com/api-reference/data-v4#operation/profiles-update-one - 

---
### Profile::delete

Delete a profile

```php
Profile::delete( int profileId ): bool
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-delete-one - 

---
### Profile::subscriptions

Get list of subscription for a profile

```php
Profile::subscriptions( int profileId ): array|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-get-all - 

---
### Profile::subscribe

Add a subscription to a profile

```php
Profile::subscribe( int profileId, string subscriptionName ): bool
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |
| `subscriptionName` | **string** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-add - 

---
### Profile::unsubscribe

Remove a subscription from a profile

```php
Profile::unsubscribe( int profileId, string subscriptionName ): bool
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |
| `subscriptionName` | **string** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-delete-one - 

---
### Profile::segmentations

Get list of segmentations for a profile

```php
Profile::segmentations( int profileId ): array|null
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-segmentations-get-all - 

---
### Profile::segment

Add a segmentation to a profile

```php
Profile::segment( int profileId, string segmentationName ): bool
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |
| `segmentationName` | **string** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-segmentations-createorupdate - 

---
### Profile::unsegment

Remove a segmentation from a profile
(I know. "to unsegment" in not a real verb)

```php
Profile::unsegment( int profileId, string segmentationName ): bool
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `profileId` | **int** | Profile Id |
| `segmentationName` | **string** |  |


**Return Value:**




**See Also:**

* https://developers.actito.com/api-reference/data-v4/#operation/profiles-segmentations-delete-one - 

---
### Profile::tables

List of profile tables

```php
Profile::tables(  ): array|null
```





**Return Value:**

list of custom tables


**See Also:**

* https://developers.actito.com/api-reference/datamodel-v5/#operation/profiletables-get-list - 

---
### Profile::schema

Get a profile table schema

```php
Profile::schema(  ): array|null
```





**Return Value:**

custom table schema


**See Also:**

* https://developers.actito.com/api-reference/datamodel-v5/#operation/profiletables-get-one - 

---
